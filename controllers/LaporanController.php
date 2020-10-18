<?php

namespace app\controllers;

use app\models\JenisKasus;
use app\models\Korban;
use Yii;
use app\models\Laporan;
use app\models\LaporanSearch;
use app\models\Otp;
use app\models\Pelapor;
use app\models\Terlapor;
use DateTime;
use DateTimeZone;
use Exception;
use GuzzleHttp\Client;
use yii\db\Connection;
use yii\debug\models\search\Db;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * LaporanController implements the CRUD actions for Laporan model.
 */
class LaporanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['http://laker.labura.go.id'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['*'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                ],
            ]
        ];
    }

    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }

    function generateNumericOTP($n) { 
        $generator = "1357902468"; 
        $result = ""; 
      
        for ($i = 1; $i <= $n; $i++) { 
            $result .= substr($generator, (rand()%(strlen($generator))), 1); 
        }  
        return $result; 
    } 

    function actionSendotp($nomor_hp,$action){
        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        $timestamp = $dt->format('Y-m-d H:i:s');

        $expired_date = date("Y-m-d H:i:s",strtotime($timestamp." +2 minutes"));

        $code = $this->generateNumericOTP(4);

        $otp = new Otp;

        $otp->nomor_hp = $nomor_hp;
        $otp->code = $code;
        $otp->action = $action;
        $otp->expired_date = $expired_date;

        if($otp->save()){
            $pesanOTP = "LAKER LABURA OTP Anda $otp->code, berlaku sampai $otp->expired_date";

            $client = new Client();
            $res = $client->post('https://masking.zenziva.net/api/sendsms/', [
                'form_params'=>[
                    'userkey' => 'dqolhx',
                    'passkey' => '20j5k6rc051egqbjpkrr-alpha',
                    'nohp' => $nomor_hp,
                    'pesan' => $pesanOTP,
                ]
            ]);

            $data = json_decode($res->getBody());

            if($data->status == 1){
                return $this->asJson(['sent'=>true]);
            }

            return $this->asJson(['sent'=>false]);
        }

        return $this->asJson(['sent'=>false]);
    }

    function actionOtp($nomor_hp,$otp){
        $otp = Otp::find()->where(['nomor_hp'=>$nomor_hp,'code'=>$otp,'is_verified'=>0])->one();
        if($otp){
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d H:i:s');

            if($otp->expired_date > $timestamp){
                $otp->is_verified = 1;
                if($otp->save()){
                    $Pelapor = Pelapor::find()->where(['nomor_hp'=>$otp->nomor_hp])->one();   
                    
                    if($Pelapor){
                        return $this->asJson(['found'=>true,'expired'=>false,'data'=>$Pelapor]);
                    }

                    return $this->asJson(['found'=>true,'expired'=>false,'data'=>[]]);
                }
            }else{
                return $this->asJson(['found'=>false,'expired'=>true]);   
            }
        }

        return $this->asJson(['found'=>false,'expired'=>false]);
    }

    function actionBuat(){
        $request = Yii::$app->request;

        $Pelapor = new Pelapor();
        $Laporan = new Laporan();
        $Korban = new Korban();
        $Terlapor = new Terlapor();
        $JenisKasus = JenisKasus::find()->all();
        
        if(
            $Pelapor->load($request->post()) &&
            $Laporan->load($request->post()) &&
            $Korban->load($request->post()) &&
            $Terlapor->load($request->post())
        ){
            $transaction = \Yii::$app->db->beginTransaction();
            try{
                $model = Pelapor::find()->where(["nomor_hp"=>$Pelapor->nomor_hp])->one();

                if($model){
                    $Pelapor = $model;
                }

                $Pelapor->save();
                
                $Laporan->pelapor_id = $Pelapor->id;
                $Laporan->status = "Belum Diproses";
                $Laporan->save();
                
                $Korban->laporan_id = $Laporan->id;
                $Korban->save();

                $Terlapor->laporan_id = $Laporan->id;
                $Terlapor->save();
                
                $transaction->commit();
                
                Yii::$app->session->addFlash("success", "Pembuatan laporan sukses");
            }catch(\Exception $e){
                $transaction->rollback();
            }
        }

        return $this->render("buat",[
            'Pelapor'=>$Pelapor,
            'Laporan'=>$Laporan,
            'Korban'=>$Korban,
            'Terlapor'=>$Terlapor,
            'JenisKasus'=>$JenisKasus
        ]);
    }

    function actionCek(){
        $request = Yii::$app->request;
        $Pelapor = new Pelapor();

        if($Pelapor->load($request->post())){
            $Pelapor = $Pelapor->find()->where(["nomor_hp"=>$Pelapor->nomor_hp])->one();

            if($Pelapor){
                $Laporans = $Pelapor->laporans;
            }else{
                $Pelapor = new Pelapor();
                $Pelapor->nomor_hp = $request->post('Pelapor')['nomor_hp'];
                $Laporans = [];
            }

            return $this->render("cek",[
                "Pelapor"=>$Pelapor,
                "Laporans"=>$Laporans
            ]);
        }

        return $this->render("cek",[
            "Pelapor"=>$Pelapor
        ]);
    }

    /**
     * Lists all Laporan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LaporanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Laporan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Laporan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Laporan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Laporan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Laporan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Laporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Laporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Laporan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
