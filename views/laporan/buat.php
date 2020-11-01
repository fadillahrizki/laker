<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Buat Laporan";

if($success = Yii::$app->session->getFlash("success")):
?>

    <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
        <span><i class="fa fa-check"></i></span>
        <strong><?=$success[0]?></strong>
        <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>    

<?php endif; ?>

<?= $this->render('otp',['action'=>'buat']) ?>

<div id="laporan" class="d-none">

<?php $form = ActiveForm::begin();?>

<div class="card card-style" id="pelapor">
    <div class="content">
        <h4>Pelapor</h4>

        <?= $form->field($Pelapor,"is_rahasia")->dropDownList([
            "Ya"=>"Ya",
            "Tidak"=>"Tidak",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Pelapor,"nama")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nama"]) ?>
        <?= $form->field($Pelapor,"alamat")->textarea(['class'=>'form-control','placeholder'=>"Masukkan alamat"]) ?>
        <?= $form->field($Pelapor,"usia")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan usia"]) ?>

        <?= $form->field($Pelapor,"jenis_kelamin")->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Pelapor,"nomor_hp")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan nomor hp"]) ?>

        <?= $form->field($Pelapor,"is_korban")->dropDownList([
            "Ya"=>"Ya",
            "Tidak"=>"Tidak",
        ],['class'=>'form-control','onchange'=>'isKorban(this.value)','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Pelapor,"hubungan_dengan_korban")->textInput(['class'=>'form-control','placeholder'=>"Hubungan dengan korban"]) ?>
    </div>
</div>

<div class="card card-style" id="korban">
    <div class="content">
        <h4>Korban</h4>

        <?= $form->field($Korban,"nama")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nama"]) ?>
        <?= $form->field($Korban,"usia")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan usia"]) ?>

        <?= $form->field($Korban,"jenis_kelamin")->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Korban,"alamat")->textarea(['class'=>'form-control','placeholder'=>"Masukkan alamat"]) ?>

        <?= $form->field($Korban,"nomor_hp")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan nomor hp (kosongkan jika tidak tahu)"]) ?>
    </div>
</div>

<div class="card card-style">
    <div class="content">
        <h4>Terlapor</h4>

        <?= $form->field($Terlapor,"nama")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nama"]) ?>
        <?= $form->field($Terlapor,"hubungan_dengan_korban")->textInput(['class'=>'form-control','placeholder'=>"Hubungan dengan korban"]) ?>
        <?= $form->field($Terlapor,"alamat")->textarea(['class'=>'form-control','placeholder'=>"Masukkan alamat"]) ?>
        <?= $form->field($Terlapor,"usia")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan usia"]) ?>

        <?= $form->field($Terlapor,"jenis_kelamin")->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Terlapor,"nomor_hp")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan nomor hp (kosongkan jika tidak tahu)"]) ?>
    </div>
</div>


<div class="card card-style">
    <div class="content">
        <h4>Kasus</h4>

        <?= $form->field($Laporan,"jenis_kasus_id")->dropDownList(
            ArrayHelper::map($JenisKasus, 'id', 'nama')
            ,['class'=>'form-control','prompt'=>"- Pilih -"]) ?>
        <?= $form->field($Laporan,"kronologi")->widget(CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'basic',
        ])  ?>
    </div>
</div>


<div class="card card-style">
    <div class="content">
        <?= Html::submitButton('Buat Laporan', ['class' => 'btn btn-block shadow-xl btn-m bg-highlight font-900']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

</div>

<script defer>
    var data = {
        nama:'',
        alamat:'',
        usia:'',
        jenis_kelamin:'',
        nomor_hp:''
    }
    
    function setKorban(key,value,korban = false){
        var input = document.querySelector(`#korban-${key}`)
        input.value = value
        
        if(korban){
            input.setAttribute("readonly",true)
        }else{
            input.removeAttribute("readonly")
        }
    }

    async function isKorban(value){
        if(value == "Ya"){
            await Object.keys(data).forEach(key=>{
                var input = document.querySelector(`#pelapor-${key}`)
                setKorban(key,input.value,true)
            })

            var hdk = document.querySelector(`#pelapor-hubungan_dengan_korban`)
            hdk.value = "Korban"
            hdk.setAttribute("readonly",true)
        }else{
            await Object.keys(data).forEach(key=>{
                setKorban(key,"")
            })

            var hdk = document.querySelector(`#pelapor-hubungan_dengan_korban`)
            hdk.value = ""
            hdk.removeAttribute("readonly")
        }
    }
</script>