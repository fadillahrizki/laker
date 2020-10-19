<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Cek Laporan";

?>


<?= $this->render('otp',['action'=>'cek']) ?>

<div id="cek">
    <div id="found" class="d-none">
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong>Laporan ditemukan!</strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div> 
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
            </div>
        </div>
    </div>

    <div id="result"></div>

    <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-red1-dark d-none" role="alert" id="not-found">
        <span><i class="fa fa-times"></i></span>
        <strong>Laporan tidak ditemukan!</strong>
        <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>    

</div>