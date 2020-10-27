<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKasus */

$this->title = 'Update Jenis Kasus: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kasuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-kasus-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
