<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Cek Laporan";

?>


<?= $this->render('otp',['action'=>'cek']) ?>

<div id="cek">

    <div id="success" class="toast toast-tiny toast-top shadow-xl bg-green1-dark" data-delay="3000" data-autohide="true">
        <i class="fa fa-check mr-3"></i>
        Laporan ditemukan!
    </div>

    <div id="found" class="d-none">
       
        <div class="card card-style">
            <div class="content">
                <div>
                    <div class="bg-yellow1-dark result"></div>
                    Belum Diproses
                </div>
    
                <div>
                    <div class="bg-green1-dark result"></div>
                    Sedang Diproses
                </div>
    
                <div>
                    <div class="bg-blue1-dark result"></div>
                    Selesai
                </div>

                <div>
                    <div class="bg-red1-dark result"></div>
                    Diarsipkan
                </div>
            </div>
        </div>
    </div>

    <div id="result"></div>

    <div id="not-found" class="toast toast-tiny toast-top shadow-xl bg-red1-dark" data-delay="3000" data-autohide="true">
        <i class="fa fa-times mr-3"></i>
        Laporan tidak ditemukan!
    </div>

</div>