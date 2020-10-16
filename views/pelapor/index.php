<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PelaporSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semua Pelapor';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelapor-index">

    <div class="card card-style">
        <div class="content">
            <p>
                <?= Html::a('Tambah Pelapor', ['create'], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'is_rahasia',
                    'nama',
                    'alamat:ntext',
                    'usia',
                    //'jenis_kelamin',
                    //'nomor_hp',
                    //'is_korban',
                    //'hubungan_dengan_korban',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        
        </div>
    </div>



</div>
