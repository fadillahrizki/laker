<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-form">

    <div class="card card-style">
        <div class="content">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'pelapor_id')->textInput() ?>

            <?= $form->field($model, 'jenis_kasus_id')->textInput() ?>

            <?= $form->field($model, 'kronologi')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            </div>

            <?php ActiveForm::end(); ?>
    
        </div>
    </div>

</div>
