<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Selesai';
$this->params['breadcrumbs'][] = $this->title;
?>

<script>
    function delMod(){
        if(confirm("Apakah anda yakin ingin menghapus ini ?")){
            return true
        }else{
            return false
        }
    }
</script>


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
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                    'buttons' => [
                        'update' => function($id, $model) {
                            return Html::a('<span class="btn bg-highlight font-900" style="margin:0 12px;">Edit</span>', ['selesai-detail', 'id' => $model['id']]);
                        },
                        'delete' => function($id, $model) {
                            return Html::a('Hapus', ['delete-selesai', 'id' => $model->id], [
                                'class' => 'btn bg-red1-dark font-900',
                                'onclick'=>'return delMod()'
                            ]);
                        },
                    ]
                ],
            ],
        ]); ?>
    
    </div>
</div>


</div>
