<?php

use yii\helpers\Url;
?>

<div id="phone">
    <div id="success" class="toast toast-tiny toast-top shadow-xl bg-green1-dark" data-delay="3000" data-autohide="true" style="width:100%">
        <i class="fa fa-check mr-3"></i>
        Kode OTP berhasil dikirim!
    </div>

    <div id="failed" class="toast toast-tiny toast-top shadow-xl bg-red1-dark" data-delay="3000" data-autohide="true" style="width:100%">
        <i class="fa fa-times mr-3"></i>
        Kode OTP gagal dikirim!
    </div>

    <div id="not-registered" class="toast toast-tiny toast-top shadow-xl bg-red1-dark" data-delay="3000" data-autohide="true" style="width:100%">
        <i class="fa fa-times mr-3"></i>
        Nomor ini belum pernah membuat laporan!
    </div>

    <div id="expired" class="toast toast-tiny toast-top shadow-xl bg-red1-dark" data-delay="3000" data-autohide="true" style="width:100%">
        <i class="fa fa-times mr-3"></i>
        Masa berlaku OTP anda sudah habis!
    </div>

    <div id="verified" class="toast toast-tiny toast-top shadow-xl bg-green1-dark" data-delay="3000" data-autohide="true" style="width:100%">
        <i class="fa fa-check mr-3"></i>
        Berhasil Terverifikasi!
    </div>

    <div id="notfound" class="toast toast-tiny toast-top shadow-xl bg-red1-dark" data-delay="3000" data-autohide="true" style="width:100%">
        <i class="fa fa-times mr-3"></i>
        OTP yang anda masukkan salah!
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
            if(action.toLowerCase() == "cek"){
                let isCek = await fetch(`<?=Url::to(["laporan/is-cek"])?>?nomor_hp=${phone.value}`)
                isCek = await isCek.json()

                otp.innerHTML = "Mengecek..."

                if(!isCek){
                    $('#phone #not-registered').toast('show')

                    otp.innerHTML = "Kirim OTP"
                    return
                }
            }

            otp.innerHTML = "Mengirim..."

            try{
                const json = await fetch(`<?=Url::to(["laporan/sendotp"])?>?nomor_hp=${phone.value}&action=${action}`)
                const res = await json.json()

                if(res.sent){
                    fgOtp.classList.remove("d-none")

                    $('#phone #success').toast('show')
                    
                    if(action.toLowerCase() == "buat"){
                        otp.innerHTML = "Verifikasi"
                    }else if(action.toLowerCase() == "cek"){
                        otp.innerHTML = "Cari Laporan"
                    }

                }else{
                    $('#phone #failed').toast('show')
                    otpD("Kirim Ulang")
                }
            }catch{
                $('#phone #failed').toast('show')
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

                            $('#phone #verified').toast('show')
                            parentPhone.querySelector("#inputs").classList.add("d-none")
                            laporan.classList.remove("d-none")
                        }

                        if(res.expired){
                            $('#phone #expired').toast('show')
                            // otpInput.value = ""
                            // otpD("Verifikasi Ulang (masukkan otp) / Kirim Ulang")
                            otp.innerHTML = "Verifikasi Ulang"
                        }

                        if(res.found === false && res.expired === false){
                            $('#phone #notfound').toast('show')
                            // otpD("Verifikasi Ulang")
                            otp.innerHTML = "Verifikasi Ulang"
                        }
                    }else{

                        if(res.found){


                            if(res.laporans.length){
                            
                                let result = document.querySelector("#cek #result")
                                document.querySelector("#cek #found").classList.remove('d-none')
                                $('#cek #success').toast('show')
                                
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
                                        case "diarsipkan": 
                                            status = "bg-red1-dark";
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
                                $('#cek #not-found').toast('show')
                                otp.innerHTML = "Tidak ditemukann"
                            }

                            // parentPhone.querySelector("#verified").classList.remove("d-none")
                            // parentPhone.querySelector("#inputs").classList.add("d-none")
                            // cek.classList.remove("d-none")
                        }

                        if(res.expired){
                            $('#phone #expired').toast('show')
                            // otpInput.value = ""
                            // otpD("Verifikasi Ulang (masukkan otp) / Kirim Ulang")
                            otp.innerHTML = "Verifikasi Ulang"
                        }

                        if(res.found === false && res.expired === false){
                            $('#phone #notfound').toast('show')
                            // otpD("Verifikasi Ulang")
                            otp.innerHTML = "Verifikasi Ulang"
                        }
                    }
                }
            }catch{
                $('#phone #notfound').toast('show')
                // otpD("Verifikasi Ulang")
                if(action.toLowerCase() == "buat"){
                    otp.innerHTML = "Verifikasi Ulang"
                }else if(action.toLowerCase() == "cek"){
                    otp.innerHTML = "Cari Lagi"
                }
            }

        }

        
    })

</script>