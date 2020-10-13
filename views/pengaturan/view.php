<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaturan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pengaturans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pengaturan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'sms_user',
            'sms_password',
            'sms_no_admin',
            'konten_admin',
            'konten_user_masuk:ntext',
            'konten_user_tindak_lanjut:ntext',
            'konten_selesai:ntext',
            'konten_kembali:ntext',
        ],
    ]) ?>

</div>
