<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Baru';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="laporan-index">

<div class="card card-style rounded-0">
    <div class="content">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'tableOptions' => ['class' => 'table table-striped '],
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
                    'attribute'=>'nomor_hp',
                    "value"=>"pelapor.nomor_hp"
                ],
                [
                    'attribute'=>'jenisKasus',
                    "value"=>"jenisKasus.nama"
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function($id, $model) {
                            return Html::a('<span class="btn bg-highlight font-900" style="margin-left:12px">Proses</span>', ['baru-detail', 'id' => $model['id']]);
                        },
                    ]
                ],
            ],
        ]); ?>
    
    </div>
</div>


</div>