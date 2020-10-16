<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KorbanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Korban';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korban-index">

<div class="card card-style">
    <div class="content">
        <p>
            <?= Html::a('Tambah Korban', ['create'], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
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
</div>


</div>
