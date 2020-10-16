<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArsipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Arsip';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-index">

    <div class="card card-style">
        <div class="content">
            <p>
                <?= Html::a('Tambah Arsip', ['create'], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'laporan_id',
                    'alasan:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        
        </div>
    </div>



</div>
