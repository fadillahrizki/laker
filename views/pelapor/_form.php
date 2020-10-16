<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pelapor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelapor-form">

<div class="card card-style">
    <div class="content">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'is_rahasia')->dropDownList([
            "Ya"=>"Ya",
            "Tidak"=>"Tidak",
        ],['prompt'=>"- Pilih Jawaban -"])->label("Rahasiakan data saya") ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'usia')->textInput() ?>

        <?= $form->field($model, 'jenis_kelamin')->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['prompt'=>"- Pilih Jenis Kelamin -"]) ?>

        <?= $form->field($model, 'nomor_hp')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'is_korban')->dropDownList([
            "Ya"=>"Ya",
            "Tidak"=>"Tidak",
        ],['prompt'=>"- Pilih Jawaban -"])->label("Pelapor adalah korban") ?>

        <?= $form->field($model, 'hubungan_dengan_korban')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn shadow-xl btn-m bg-highlight font-900']) ?>
            <?= Html::a('Kembali',['/pelapor'] ,['class' => 'btn shadow-xl btn-m bg-orange-light font-900']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    
    </div>
</div>

</div>
