<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Arsip */

$this->title = 'Update Arsip: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Arsips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arsip-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
