<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = "Detail laporan : $model->id";
$this->params['breadcrumbs'][] = ['label' => 'Laporans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="laporan-view">

    <div class="card card-style">
        <div class="content">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn shadow-xl btn-m bg-red1-light font-900',
                    'data' => [
                        'confirm' => 'Apakah kamu yakin ingin menghapus ini?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'pelapor_id',
                    'jenis_kasus_id',
                    'kronologi:ntext',
                    'status',
                ],
            ]) ?>
        </div>
    </div>

</div>
