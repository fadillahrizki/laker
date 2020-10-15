<?php


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = "Buat Laporan";

if($success = Yii::$app->session->getFlash("success")):
?>

    <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
        <span><i class="fa fa-check"></i></span>
        <strong><?=$success[0]?></strong>
        <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>    

<?php endif;
$form = ActiveForm::begin();
?>

<div class="card card-style" id="pelapor">
    <div class="content">
        <h4>Pelapor</h4>

        <?= $form->field($Pelapor,"is_rahasia")->dropDownList([
            "Ya"=>"Ya",
            "Tidak"=>"Tidak",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Pelapor,"nama")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nama"]) ?>
        <?= $form->field($Pelapor,"alamat")->textarea(['class'=>'form-control','placeholder'=>"Masukkan alamat"]) ?>
        <?= $form->field($Pelapor,"usia")->textInput(['class'=>'form-control','placeholder'=>"Masukkan usia"]) ?>

        <?= $form->field($Pelapor,"jenis_kelamin")->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Pelapor,"nomor_hp")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nomor hp"]) ?>

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
        <?= $form->field($Korban,"alamat")->textarea(['class'=>'form-control','placeholder'=>"Masukkan alamat"]) ?>
        <?= $form->field($Korban,"usia")->textInput(['class'=>'form-control','placeholder'=>"Masukkan usia"]) ?>

        <?= $form->field($Korban,"jenis_kelamin")->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Korban,"nomor_hp")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nomor hp"]) ?>
    </div>
</div>

<div class="card card-style">
    <div class="content">
        <h4>Terlapor</h4>

        <?= $form->field($Terlapor,"nama")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nama"]) ?>
        <?= $form->field($Terlapor,"alamat")->textarea(['class'=>'form-control','placeholder'=>"Masukkan alamat"]) ?>
        <?= $form->field($Terlapor,"usia")->textInput(['class'=>'form-control','placeholder'=>"Masukkan usia"]) ?>

        <?= $form->field($Terlapor,"jenis_kelamin")->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Terlapor,"nomor_hp")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nomor hp"]) ?>
    </div>
</div>


<div class="card card-style">
    <div class="content">
        <h4>Kasus</h4>

        <?= $form->field($Laporan,"jenis_kasus_id")->dropDownList(
            ArrayHelper::map($JenisKasus, 'id', 'nama')
            ,['class'=>'form-control','prompt'=>"- Pilih -"]) ?>
        <?= $form->field($Laporan,"kronologi")->textarea(['class'=>'form-control','placeholder'=>"Kronologi.."]) ?>
    </div>
</div>


<div class="card card-style">
    <div class="content">
        <?= Html::submitButton('Buat Laporan', ['class' => 'btn btn-block shadow-xl btn-m bg-highlight font-900']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

<script>
    var data = {
        nama:'',
        alamat:'',
        usia:'',
        jenis_kelamin:'',
        nomor_hp:''
    }
    
    function setKorban(key,value){
        var input = document.getElementsByName(`Korban[${key}]`)[0]
        input.value = value
    }

    function isKorban(value){
        if(value == "Ya"){
            Object.keys(data).forEach(key=>{
                var input = document.getElementsByName(`Pelapor[${key}]`)
                setKorban(key,input[0].value)
            })
        }
    }
</script>