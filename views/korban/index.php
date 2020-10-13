<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KorbanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Korbans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korban-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Korban', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'alamat:ntext',
            'usia',
            'jenis_kelamin',
            //'nomor_hp',
            //'laporan_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
