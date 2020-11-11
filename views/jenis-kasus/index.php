<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisKasusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Jenis Kasus';
$this->params['breadcrumbs'][] = $this->title;
if($success = Yii::$app->session->getFlash("success")):
    
    ?>
    
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong><?=$success[0]?></strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    
    <?php endif; ?>

<script>
    function delMod(){
        if(confirm("Apakah anda yakin ingin menghapus ini ?")){
            return true
        }else{
            return false
        }
    }
</script>

<div class="jenis-kasus-index">

    <div class="card card-style rounded-0">
        <div class="content">

            <p>
                <?= Html::a('Tambah Jenis Kasus', ['create'], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'tableOptions' => ['class' => 'table table-striped '],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'nama',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}{delete}',
                        'buttons' => [
                            'update' => function($url) {
                                return Html::a('<span class="btn bg-highlight font-900" style="margin:0 12px;">Edit</span>', $url);
                            },
                            'delete' => function($url) {
                                return Html::a('<span class="btn bg-red1-dark font-900">Hapus</span>', $url,['onclick'=>'return delMod()']);
                            }
                        ]
                    ],
                ],
            ]); ?>
        
        </div>
    </div>


</div>
