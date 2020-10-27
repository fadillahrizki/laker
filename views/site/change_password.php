<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
$this->title = "Ubah password";
if($success = Yii::$app->session->getFlash("success")):
    ?>
    
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong><?=$success[0]?></strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    
    <?php endif; ?>

<div class="laporan-form">

    <div class="card card-style">
        <div class="content">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'password_hash')->textInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Simpan', ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            </div>

            <?php ActiveForm::end(); ?>
    
        </div>
    </div>

</div>
