<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengaturanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengaturans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaturan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pengaturan', ['create'], ['class' => 'btn btn-success']) ?>
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
