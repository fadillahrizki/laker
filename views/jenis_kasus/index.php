<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JenisKasusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Jenis Kasus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kasus-index">

    <div class="card card-style">
        <div class="content">

            <p>
                <?= Html::a('Tambah Jenis Kasus', ['create'], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'nama',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        
        </div>
    </div>


</div>
