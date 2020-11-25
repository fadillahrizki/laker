<?php

namespace app\controllers;

use Yii;
use app\models\Pengaturan;
use app\models\PengaturanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengaturanController implements the CRUD actions for Pengaturan model.
 */
class PengaturanController extends Controller
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

    /**
     * Lists all Pengaturan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Pengaturan::find()->one();

        if ($model->load(Yii::$app->request->post())) {
            if(isset($_FILES['Pengaturan']['name']['alarm_file']))
            {
                $filename = 'uploads/'.$_FILES['Pengaturan']['name']['alarm_file'];
                copy($_FILES['Pengaturan']['tmp_name']['alarm_file'],$filename);
                $model->alarm_file = $filename;
            }
            $model->save();
            Yii::$app->session->addFlash("success", "Pengaturan berhasil disimpan!");
            return $this->redirect(['index']);
        }

        return $this->render('index', [
            'model'=>$model
        ]);
    }

    /**
     * Displays a single Pengaturan model.
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
     * Creates a new Pengaturan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pengaturan();

        if ($model->load(Yii::$app->request->post())) {
            if(isset($_FILES['Pengaturan']['alarm_file']))
            {
                $filename = 'uploads/'.$_FILES['Pengaturan']['alarm_file']['name'];
                copy($_FILES['Pengaturan']['alarm_file']['tmp_name'],$filename);
                $model->alarm_file = $filename;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengaturan model.
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
     * Deletes an existing Pengaturan model.
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
     * Finds the Pengaturan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengaturan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pengaturan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
