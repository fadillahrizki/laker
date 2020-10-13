<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengaturanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaturan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'sms_user') ?>

    <?= $form->field($model, 'sms_password') ?>

    <?= $form->field($model, 'sms_no_admin') ?>

    <?= $form->field($model, 'konten_admin') ?>

    <?php // echo $form->field($model, 'konten_user_masuk') ?>

    <?php // echo $form->field($model, 'konten_user_tindak_lanjut') ?>

    <?php // echo $form->field($model, 'konten_selesai') ?>

    <?php // echo $form->field($model, 'konten_kembali') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
