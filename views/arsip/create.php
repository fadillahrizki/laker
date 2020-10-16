<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Arsip */

$this->title = 'Create Arsip';
$this->params['breadcrumbs'][] = ['label' => 'Arsips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
