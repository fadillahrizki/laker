<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaturan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaturan-form">

<div class="card card-style">
    <div class="content">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sms_user')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sms_password')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'sms_no_admin')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'konten_admin')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'konten_user_masuk')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'konten_user_tindak_lanjut')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'konten_selesai')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'konten_kembali')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
        </div>
    
    </div>
</div>

    <?php ActiveForm::end(); ?>

</div>
