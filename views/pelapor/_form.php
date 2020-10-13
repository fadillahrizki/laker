<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pelapor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelapor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'is_rahasia')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'usia')->textInput() ?>

    <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_korban')->textInput() ?>

    <?= $form->field($model, 'hubungan_dengan_korban')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
