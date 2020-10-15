<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = "Cek Laporan";

$form = ActiveForm::begin();
?>

<div class="card card-style">
    <div class="content">
        <?= $form->field($Pelapor,'nomor_hp')->textInput(['placeholder'=>"Masukkan nomor hp"])?>
        <button class="btn shadow-xl btn-m bg-highlight font-900">Cari Laporan</button>
    </div>
</div>

<?php ActiveForm::end() ?>

<?php if(isset($Laporans)): ?>
    <?php if(count($Laporans)): ?>
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
    <?php else:?>
            <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-red1-dark" role="alert">
                <span><i class="fa fa-times"></i></span>
                <strong>Laporan tidak ditemukan!</strong>
                <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
            </div>    
    <?php endif ?>
    <?php foreach($Laporans as $laporan):
        switch(strtolower($laporan->status)){
            case "belum diproses": 
                $status = "bg-yellow1-dark";
            break;
            case "sedang diproses": 
                $status = "bg-green1-dark";
            break;
            case "selesai": 
                $status = "bg-blue1-dark";
            break;
        }
    ?>
    <a href="<?=Url::to(["/laporan/detail?id=$laporan->id"])?>">
        <div class="card card-style <?=$status?>">
            <div class="content font-700" style="font-size:20px;">
                <div>ID : <strong><?=$laporan->id?></strong></div>
            </div>
        </div>
    </a>
    <?php endforeach ?>
<?php endif ?>
