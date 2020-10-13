<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pelapor_id')->textInput() ?>

    <?= $form->field($model, 'jenis_kasus_id')->textInput() ?>

    <?= $form->field($model, 'kronologi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
