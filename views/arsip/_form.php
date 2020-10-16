<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Arsip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-form">

<div class="card card-style">
    <div class="content">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'laporan_id')->textInput() ?>

        <?= $form->field($model, 'alasan')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    
    </div>
</div>

</div>
