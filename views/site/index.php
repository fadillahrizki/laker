<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Home';
if($success = Yii::$app->session->getFlash("success")):
    ?>
    
        <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
            <span><i class="fa fa-check"></i></span>
            <strong><?=$success[0]?></strong>
            <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>    
    
    <?php endif; ?>

<div class="row text-center mb-0">
    <div class="col-12">
        <a href="<?=Url::to(['/laporan/buat'])?>" class="card card-style mb-3">
            <div class="d-flex py-5">
                <div class="mt-2 pl-3 ml-2">
                    <h1 class="center-text">
                        <i data-feather="edit-2" 
                            data-feather-line="1" 
                            data-feather-size="40" 
                            data-feather-color="blue2-dark" 
                            data-feather-bg="blue2-fade-light">
                        </i>
                    </h1>
                </div>
                <div class="pt-2 mt-1 pl-4">
                    <h4 class="color-theme font-600">Buat Laporan</h4>
                    <p class="mt-n2 font-11 text-left color-highlight mb-2">
                        Tap untuk melihat
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12">
        <a href="<?=Url::to(['/laporan/cek'])?>" class="card card-style mb-3">
            <div class="d-flex py-5">
                <div class="mt-2 pl-3 ml-2">
                    <h1 class="center-text">
                        <i data-feather="search" 
                            data-feather-line="1" 
                            data-feather-size="40" 
                            data-feather-color="green2-dark" 
                            data-feather-bg="green2-fade-light">
                        </i>
                    </h1>
                </div>
                <div class="pt-2 mt-1 pl-4">
                    <h4 class="color-theme font-600">Cek Laporan</h4>
                    <p class="mt-n2 font-11 text-left color-highlight mb-2">
                        Tap untuk melihat
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12">
        <a href="https://dpppa.labura.go.id/" class="card card-style mb-3">
            <div class="d-flex py-5">
                <div class="mt-2 pl-3 ml-2">
                    <h1 class="center-text">
                        <i data-feather="file" 
                            data-feather-line="1" 
                            data-feather-size="40" 
                            data-feather-color="magenta1-dark" 
                            data-feather-bg="magenta1-fade-light">
                        </i>
                    </h1>
                </div>
                <div class="pt-2 mt-1 pl-4">
                    <h4 class="color-theme font-600">Lihat Berita</h4>
                    <p class="mt-n2 font-11 text-left color-highlight mb-2">
                        Tap untuk melihat
                    </p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-12">
        <a href="<?=Url::to(['/site/tentang'])?>" class="card card-style mb-3">
            <div class="d-flex py-5">
                <div class="mt-2 pl-3 ml-2">
                    <h1>
                        <i data-feather="alert-circle" 
                            data-feather-line="1" 
                            data-feather-size="40" 
                            data-feather-color="yellow1-dark" 
                            data-feather-bg="yellow1-fade-light">
                        </i>
                    </h1>
                </div>
                <div class="pt-2 mt-1 pl-4">
                    <h4 class="color-theme font-600">Tentang Aplikasi</h4>
                    <p class="mt-n2 font-11 text-left color-highlight mb-2">
                        Tap untuk melihat
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>