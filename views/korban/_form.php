<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Korban */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="korban-form">

<div class="card card-style">
    <div class="content">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'usia')->textInput() ?>

        <?= $form->field($model, 'jenis_kelamin')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nomor_hp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'laporan_id')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

</div>
