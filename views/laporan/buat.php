<?php

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

<div id="phone">
    <div id="success" class="d-none">
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong>Kode OTP berhasil dikirim!</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    </div>

    <div id="failed" class="d-none">
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-red1-dark" role="alert">
            <span><i class="fa fa-times"></i></span>
            <strong>Kode OTP gagal dikirim!</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    </div>

    <div id="expired" class="d-none">
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-red1-dark" role="alert">
            <span><i class="fa fa-times"></i></span>
            <strong>Masa berlaku OTP anda sudah habis!</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    </div>

    <div id="verified" class="d-none">
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong>Berhasil Terverifikasi!</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    </div>

    <div id="notfound" class="d-none">
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-red1-dark" role="alert">
            <span><i class="fa fa-times"></i></span>
            <strong>OTP yang anda masukkan salah!</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    </div>

    <div class="card card-style" id="inputs">
        <div class="content">
            <div class="form-group" id="nomor_hp" >
                <label for="">Nomor HP</label>
                <input type="tel" class="form-control" placeholder="Masukkan nomor hp">
            </div>
            <div class="form-group d-none" id="otp">
                <label for="">Kode OTP</label>
                <input type="tel" class="form-control" placeholder="Masukkan kode OTP" maxlength="4">
            </div>
            <button id="btn-otp" class="btn shadow-xl btn-m bg-highlight font-900">Kirim OTP</button>
        </div>
    </div>
</div>

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
        <?= $form->field($Korban,"alamat")->textarea(['class'=>'form-control','placeholder'=>"Masukkan alamat"]) ?>
        <?= $form->field($Korban,"usia")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan usia"]) ?>

        <?= $form->field($Korban,"jenis_kelamin")->dropDownList([
            "Laki-laki"=>"Laki-laki",
            "Perempuan"=>"Perempuan",
        ],['class'=>'form-control','prompt'=>"- Pilih -"]) ?>

        <?= $form->field($Korban,"nomor_hp")->input('tel',['class'=>'form-control','placeholder'=>"Masukkan nomor hp (kosongkan jika tidak tahu)"]) ?>
    </div>
</div>

<div class="card card-style">
    <div class="content">
        <h4>Terlapor</h4>

        <?= $form->field($Terlapor,"nama")->textInput(['class'=>'form-control','placeholder'=>"Masukkan nama"]) ?>
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
        <?= $form->field($Laporan,"kronologi")->textarea(['class'=>'form-control','placeholder'=>"Kronologi.."]) ?>
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

    var parentPhone = document.querySelector("#phone")
    var otp = parentPhone.querySelector("#btn-otp")

    function otpD(text){
        otp.setAttribute("disabled","true")

        let time = 120
        let minutes = 0;
        let sec = 0;
        
        function setMit(seconds){
            if(seconds >= 60){
                minutes+=1;

                if(seconds-60 >= 60){
                    setMit(seconds-60)
                }else{
                    sec = seconds-60
                }
            }else{
                sec = seconds
            }
        }

        setMit(time)

        var tm = setInterval(()=>{

            if(sec < 0 && minutes > 0){
                minutes -= 1
                sec = 59
            }

            if(time == 0){
                clearInterval(tm)

                otp.removeAttribute("disabled")
                otp.innerHTML = text
            }else{
                otp.innerHTML = text+" ("+minutes+":"+sec+")"
            }


            sec--;
            time--;

        },1000)
    }

    otp.addEventListener("click",async function(){
        var fgPhone = document.querySelector("#phone #nomor_hp")
        var phone = fgPhone.querySelector("input")
        var fgOtp = document.querySelector("#phone #otp")
        var otpInput = fgOtp.querySelector("input")

        if(otpInput.value == ""){
            otp.innerHTML = "Mengirim..."

            try{
                const json = await fetch(`<?=Url::to(["laporan/sendotp"])?>?nomor_hp=${phone.value}&action=buat`)
                const res = await json.json()

                if(res.sent){
                    parentPhone.querySelector("#success").classList.remove("d-none")
                    fgOtp.classList.remove("d-none")
                    otp.innerHTML = "Verifikasi"
                }else{
                    parentPhone.querySelector("#failed").classList.remove("d-none")
                    otpD("Kirim Ulang")
                }
            }catch{
                parentPhone.querySelector("#failed").classList.remove("d-none")
                otpD("Kirim Ulang")
            }

        }else{
            otp.innerHTML = "Memverifikasi..."

            try{
                const json = await fetch(`<?=Url::to(["laporan/otp"])?>?nomor_hp=${phone.value}&otp=${otpInput.value}`)
                const res = await json.json()

                if(res){
                    var laporan = document.querySelector("#laporan")

                    if(res.found){
                        var pInp = document.querySelector(`#pelapor-nomor_hp`)
                        pInp.value = phone.value

                        pInp.setAttribute("disabled",true)

                        if(res.data){
                            Object.keys(res.data).forEach(key=>{
                                if(key!="id"){
                                    var input = document.querySelector(`#pelapor-${key}`)
                                    input.value = res.data[key] 

                                    if(key == "is_korban"){
                                        isKorban(res.data[key])
                                    }
                                }
                            })
                        }

                        otp.innerHTML = "Terverifikasi"

                        parentPhone.querySelector("#verified").classList.remove("d-none")
                        parentPhone.querySelector("#inputs").classList.add("d-none")
                        laporan.classList.remove("d-none")
                    }

                    if(res.expired){
                        parentPhone.querySelector("#expired").classList.remove("d-none")
                        otpInput.value = ""
                        otpD("Verifikasi Ulang (masukkan otp) / Kirim Ulang")
                    }

                    if(res.found === false && res.expired === false){
                        parentPhone.querySelector("#notfound").classList.remove("d-none")
                        otpD("Verifikasi Ulang")
                    }
                }
            }catch{
                parentPhone.querySelector("#notfound").classList.remove("d-none")
                otpD("Verifikasi Ulang")
            }

        }

        
    })
    
    function setKorban(key,value,korban = false){
        var input = document.querySelector(`#korban-${key}`)
        input.value = value
        
        if(korban){
            input.setAttribute("disabled",true)
        }else{
            input.removeAttribute("disabled")
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
            hdk.setAttribute("disabled",true)
        }else{
            await Object.keys(data).forEach(key=>{
                setKorban(key,"")
            })

            var hdk = document.querySelector(`#pelapor-hubungan_dengan_korban`)
            hdk.value = ""
            hdk.removeAttribute("disabled")
        }
    }
</script>