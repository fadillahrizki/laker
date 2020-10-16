<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index">

<div class="card card-style">
    <div class="content">
        <p>
            <?= Html::a('Tambah Laporan', ['create'], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                [
                    'attribute'=>'pelapor',
                    "value"=>"pelapor.nama"
                ],
                [
                    'attribute'=>'jenisKasus',
                    "value"=>"jenisKasus.nama"
                ],
                'kronologi:ntext',
                'status',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    </div>
</div>


</div>
