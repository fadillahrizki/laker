<?php

use yii\helpers\Url;
?>

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


<script>


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
        const action = "<?=$action?>"

        if(otpInput.value == ""){
            otp.innerHTML = "Mengirim..."

            try{
                const json = await fetch(`<?=Url::to(["laporan/sendotp"])?>?nomor_hp=${phone.value}&action=${action}`)
                const res = await json.json()

                if(res.sent){
                    parentPhone.querySelector("#success").classList.remove("d-none")
                    fgOtp.classList.remove("d-none")
                    
                    if(action.toLowerCase() == "buat"){
                        otp.innerHTML = "Verifikasi"
                    }else if(action.toLowerCase() == "cek"){
                        otp.innerHTML = "Cari Laporan"
                    }

                }else{
                    parentPhone.querySelector("#failed").classList.remove("d-none")
                    otpD("Kirim Ulang")
                }
            }catch{
                parentPhone.querySelector("#failed").classList.remove("d-none")
                otpD("Kirim Ulang")
            }

        }else{
            if(action.toLowerCase() == "buat"){
                otp.innerHTML = "Memverifikasi..."
            }else if(action.toLowerCase() == "cek"){
                otp.innerHTML = "Mencari..."
            }

            try{
                
                const json = await fetch(`<?=Url::to(["laporan/otp"])?>?nomor_hp=${phone.value}&otp=${otpInput.value}&action=${action}`)
                const res = await json.json()

                if(res){

                    if(action.toLowerCase() == "buat"){
                        var laporan = document.querySelector("#laporan")

                        if(res.found){
                            var pInp = document.querySelector(`#pelapor-nomor_hp`)
                            pInp.value = phone.value

                            pInp.setAttribute("readonly",true)

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
                    }else{

                        if(res.found){

                            let result = document.querySelector("#cek #result")
                            document.querySelector("#cek #found").classList.remove('d-none')

                            if(res.laporans.length){
                                let html = ''
                                res.laporans.forEach(laporan=>{
                                    let status = ''

                                    switch(laporan.status.toLowerCase()){
                                        case "belum diproses": 
                                            status = "bg-yellow1-dark";
                                        break;
                                        case "sedang diproses": 
                                            status = "bg-green1-dark";
                                        break;
                                        case "selesai": 
                                            status = "bg-blue1-dark";
                                        break;
                                    }

                                    html += `
                                    <a href='<?=Url::to(['laporan/detail'])?>?id=${laporan.id}'>
                                        <div class="card card-style ${status}">
                                            <div class="content font-700" style="font-size:20px;">
                                                <div>ID : <strong>${laporan.id}</strong></div>
                                            </div>
                                        </div>
                                    </a>`
                                })

                                result.innerHTML = html;

                                otp.innerHTML = "Ditemukan"

                            }else{
                                document.querySelector("#cek #not-found").classList.remove('d-none')
                                otp.innerHTML = "Tidak ditemukann"
                            }

                            // parentPhone.querySelector("#verified").classList.remove("d-none")
                            // parentPhone.querySelector("#inputs").classList.add("d-none")
                            // cek.classList.remove("d-none")
                        }

                        if(res.expired){
                            parentPhone.querySelector("#expired").classList.remove("d-none")
                            otpInput.value = ""
                            otpD("Verifikasi Ulang (masukkan otp) / Kirim Ulang")
                        }

                        if(res.found === false && res.expired === false){
                            document.querySelector("#cek #notfound").classList.remove('d-none')
                            // otpD("Verifikasi Ulang")
                            otp.innerHTML = "Verifikasi Ulang"
                        }
                    }
                }
            }catch{
                parentPhone.querySelector("#notfound").classList.remove("d-none")
                otpD("Verifikasi Ulang")
            }

        }

        
    })

</script>