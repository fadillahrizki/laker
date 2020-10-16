<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korban */

$this->title = 'Update Korban: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Korbans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="korban-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
