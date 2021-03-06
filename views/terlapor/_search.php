<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TerlaporSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="terlapor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'usia') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'nomor_hp') ?>

    <?php // echo $form->field($model, 'laporan_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
