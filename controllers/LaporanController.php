<?php

namespace app\controllers;

use app\models\Arsip;
use app\models\JenisKasus;
use app\models\Korban;
use Yii;
use app\models\Laporan;
use app\models\LaporanSearch;
use app\models\Otp;
use app\models\Pelapor;
use app\models\Pengaturan;
use app\models\Terlapor;
use app\widgets\Alert;
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
                'actions' => [],
            ],
        ];
    }

    public $pengaturan;

    function beforeAction($action)
    {
        $this->pengaturan  = Pengaturan::find()->one();

        return parent::beforeAction($action);
    }

    function actionGetNotify()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $laporan = Laporan::find()->where(['status'=>'Notify'])->all();
            Laporan::updateAll(['status'=>'Belum Diproses'],['status'=>'Notify']);
            return $laporan;
        }
    }


    public function actionDetail($id)
    {
        $this->layout = "frontend";
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
                    'userkey' => $this->pengaturan->sms_user,
                    'passkey' => $this->pengaturan->sms_password,
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

    function actionOtp($nomor_hp,$otp,$action){
        
        $otp = Otp::find()->where(['nomor_hp'=>$nomor_hp,'code'=>$otp,'is_verified'=>0,'action'=>strtolower($action)])->one();
        if($otp){
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d H:i:s');

            if($otp->expired_date > $timestamp){
                $otp->is_verified = 1;
                if($otp->save()){
                    $Pelapor = Pelapor::find()->where(['nomor_hp'=>$otp->nomor_hp])->one();   
                    
                    if($Pelapor){
                        if(strtolower($action) == "cek"){
                            $Laporans = $Pelapor->laporans;

                            return $this->asJson(['found'=>true,'expired'=>false,'data'=>$Pelapor,'laporans'=>$Laporans]);
                        }else{
                            return $this->asJson(['found'=>true,'expired'=>false,'data'=>$Pelapor]);
                        }
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
        $this->layout = "frontend";
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
                
                $Laporan->id = substr(md5($Pelapor->id.date("Y-m-d H:i:s")), 0, 8);
                $Laporan->pelapor_id = $Pelapor->id;
                // $Laporan->status = "Belum Diproses";
                $Laporan->status = "Notify";
                $Laporan->save();
                
                $Korban->laporan_id = $Laporan->id;
                $Korban->save();

                $Terlapor->laporan_id = $Laporan->id;
                $Terlapor->save();
                
                $transaction->commit();

                $client = new Client();
                
                $client->post('https://masking.zenziva.net/api/sendsms/', [
                    'form_params'=>[
                        'userkey' => $this->pengaturan->sms_user,
                        'passkey' => $this->pengaturan->sms_password,
                        'nohp' => $this->pengaturan->sms_no_admin,
                        'pesan' => str_replace("[id_laporan]",$Laporan->id,$this->pengaturan->konten_admin),
                    ]
                ]);

                $for_replace = ["[nama_pelapor]","[id_laporan]"];
                $to_replace = [$Pelapor->nama,$Laporan->id];

                $pesan = str_replace($for_replace,$to_replace,$this->pengaturan->konten_user_masuk);

                $client->post('https://masking.zenziva.net/api/sendsms/', [
                    'form_params'=>[
                        'userkey' => $this->pengaturan->sms_user,
                        'passkey' => $this->pengaturan->sms_password,
                        'nohp' => $Pelapor->nomor_hp,
                        'pesan' => $pesan,
                    ]
                ]);

                Yii::$app->session->addFlash("success", "Pembuatan laporan sukses");
                
                return $this->redirect(['site/index']);
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

    function actionIsCek($nomor_hp){
        $Pelapor = Pelapor::find()->where(['nomor_hp'=>$nomor_hp])->count();   

        if($Pelapor){
            return $this->asJson($Pelapor);
        }

        return $this->asJson(null);
    }

    function actionCek(){

        $this->layout = "frontend";
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

    function actionBaru(){

        $searchModel = new LaporanSearch();
        $searchModel->status = ["Belum Diproses","Notify"];

        $query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);
        $dataProvider->sort->attributes['created_at'] = [ 
            'default' => SORT_DESC
        ]; 

        return $this->render('baru', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    function actionBaruDetail($id){
        $Arsip = new Arsip();
        $model = $this->findModel($id);
        $request = Yii::$app->request;

        if($model->load($request->post())){
            
            if($model->save()){

                $client = new Client();

                $for_replace = ["[nama_pelapor]","[id_laporan]"];
                $to_replace = [$model->pelapor->nama,$model->id];

                $pesan = str_replace($for_replace,$to_replace,$this->pengaturan->konten_user_tindak_lanjut);

                $client->post('https://masking.zenziva.net/api/sendsms/', [
                    'form_params'=>[
                        'userkey' => $this->pengaturan->sms_user,
                        'passkey' => $this->pengaturan->sms_password,
                        'nohp' => $model->pelapor->nomor_hp,
                        'pesan' => $pesan,
                    ]
                ]);

                return $this->redirect(['baru']);
            };

        }

        if($Arsip->load($request->post())){
            $laporan = $this->findModel($Arsip->laporan_id);

            $laporan->status = "Diarsipkan";
            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d H:i:s');
            $laporan->laporan_arsip = $timestamp;

            if($Arsip->save() && $laporan->save()){
                $client = new Client();

                $for_replace = ["[nama_pelapor]","[id_laporan]"];
                $to_replace = [$model->pelapor->nama,$model->id];

                $pesan = str_replace($for_replace,$to_replace,$this->pengaturan->konten_arsip);

                $client->post('https://masking.zenziva.net/api/sendsms/', [
                    'form_params'=>[
                        'userkey' => $this->pengaturan->sms_user,
                        'passkey' => $this->pengaturan->sms_password,
                        'nohp' => $model->pelapor->nomor_hp,
                        'pesan' => $pesan,
                    ]
                ]);

                return $this->redirect(['baru']);
            };

        }

        return $this->render('baru_detail', [
            'model' => $model,
            'Arsip' => $Arsip
        ]);
    }

    function actionBelumSelesaiDetail($id){
        $model = $this->findModel($id);
        $request = Yii::$app->request;

        if($model->load($request->post())){

            $tz = 'Asia/Jakarta';
            $dt = new DateTime("now", new DateTimeZone($tz));
            $timestamp = $dt->format('Y-m-d H:i:s');
            $model->laporan_selesai = $timestamp;
            
            if($model->save()){
                $client = new Client();

                $for_replace = ["[nama_pelapor]","[id_laporan]"];
                $to_replace = [$model->pelapor->nama,$model->id];

                $pesan = str_replace($for_replace,$to_replace,$this->pengaturan->konten_selesai);

                $client->post('https://masking.zenziva.net/api/sendsms/', [
                    'form_params'=>[
                        'userkey' => $this->pengaturan->sms_user,
                        'passkey' => $this->pengaturan->sms_password,
                        'nohp' => $model->pelapor->nomor_hp,
                        'pesan' => $pesan,
                    ]
                ]);

                return $this->redirect(['belum-selesai']);
            };

        }

        return $this->render('belum_selesai_detail', [
            'model' => $model,
        ]);
    }

    function actionBelumSelesai(){
        $searchModel = new LaporanSearch();
        $searchModel->status = "Sedang Diproses";

        $query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);

        $dataProvider->sort->attributes['created_at'] = [ 
            'default' => SORT_DESC
        ]; 

        return $this->render('belum_selesai', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    function actionSelesaiDetail($id){
        $model = $this->findModel($id);
        $request = Yii::$app->request;

        if($model->load($request->post())){
            
            if($model->save()){
                return $this->redirect(['selesai']);
            };

        }

        return $this->render('selesai_detail', [
            'model' => $model,
        ]);
    }

    function actionSelesai(){
        $searchModel = new LaporanSearch();
        $searchModel->status = "Selesai";

        $query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);

        $dataProvider->sort->attributes['laporan_selesai'] = [ 
            'default' => SORT_DESC
        ]; 

        return $this->render('selesai', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    function actionArsipDetail($id){
        $model = $this->findModel($id);
        $request = Yii::$app->request;

        if($model->load($request->post())){
            
            if($model->save()){
                return $this->redirect(['arsip']);
            };

        }

        return $this->render('arsip_detail', [
            'model' => $model,
        ]);
    }

    function actionArsip(){
        $searchModel = new LaporanSearch();
        $searchModel->status = "Diarsipkan";

        $query = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($query);

        $dataProvider->sort->attributes['laporan_arsip'] = [ 
            'default' => SORT_DESC
        ]; 

        return $this->render('arsip', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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

    public function actionDeleteBelum($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->addFlash("success", "Menghapus laporan belum selesai sukses!");

        return $this->redirect(['belum-selesai']);
    }

    public function actionDeleteArsip($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->addFlash("success", "Menghapus laporan Arsip sukses!");

        return $this->redirect(['arsip']);
    }

    public function actionDeleteBaru($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->addFlash("success", "Menghapus laporan baru sukses!");

        return $this->redirect(['baru']);
    }

    public function actionDeleteSelesai($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->addFlash("success", "Menghapus laporan selesai selesai sukses!");

        return $this->redirect(['selesai']);
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
        if (($model = Laporan::find()->where(['id'=>$id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
