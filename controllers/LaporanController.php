<?php

namespace app\controllers;

use app\models\JenisKasus;
use app\models\Korban;
use Yii;
use app\models\Laporan;
use app\models\LaporanSearch;
use app\models\Pelapor;
use app\models\Terlapor;
use Exception;
use yii\db\Connection;
use yii\debug\models\search\Db;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        ];
    }

    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
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
