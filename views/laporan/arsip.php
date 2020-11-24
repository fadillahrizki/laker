<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Diarsipkan';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="laporan-index">

<div class="card card-style rounded-0">
    <div class="content">

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'tableOptions' => ['class' => 'table table-striped'],
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
                    'attribute'=>'laporan_masuk',
                    "value"=>"laporan_masuk"
                ],
                [
                    'attribute'=>'laporan_arsip',
                    "value"=>"laporan_arsip"
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [
                        'update' => function($id, $model) {
                            return Html::a('<span class="btn bg-highlight font-900" style="margin:0 12px;">Edit</span>', ['arsip-detail', 'id' => $model['id']]);
                        },
                        'delete' => function($id, $model) {
                            return Html::a('Hapus', ['delete-arsip', 'id' => $model['id']], [
                                'class' => 'btn bg-red1-dark font-900',
                            ]);
                        },
                    ]
                ],
            ],
        ]); ?>
    
    </div>
</div>


</div>
