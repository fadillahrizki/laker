<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terlapor */

$this->title = 'Update Terlapor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Terlapors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terlapor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
