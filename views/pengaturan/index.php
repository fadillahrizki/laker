<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengaturanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Pengaturan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaturan-index">

    <div class="card card-style">
        <div class="content">

            <p>
                <?= Html::a('Tambah Pengaturan', ['create'], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'sms_user',
                    'sms_password',
                    'sms_no_admin',
                    'konten_admin',
                    //'konten_user_masuk:ntext',
                    //'konten_user_tindak_lanjut:ntext',
                    //'konten_selesai:ntext',
                    //'konten_kembali:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        
        </div>
    </div>


</div>
