<?php

use app\models\JenisKasus;
use app\models\Laporan;

$countBaru = Laporan::find()->where(['status'=>"Belum Diproses"])->orWhere(['status'=>"Notify"])->count();
$countBelum = Laporan::find()->where(['status'=>"Sedang Diproses"])->count();
$countArsip = Laporan::find()->where(['status'=>"Diarsipkan"])->count();
$countSelesai = Laporan::find()->where(['status'=>"Selesai"])->count();
$countKasus = JenisKasus::find()->count();

$this->title = "Home"
?>

<div class="jenis-kasus-index row">
    <div class="col-12 col-md-6">
        <div class="card card-style rounded-0">
            <div class="content d-flex">
                <span class="icon icon-l">
                    <i class="fa fa-file rounded-m bg-yellow1-dark mb-3 mr-3"></i>
                </span>
                <div class="d-inline">
                    <h1><?=$countBaru?></h1>
                    <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Laporan Baru</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card card-style rounded-0">
            <div class="content d-flex">
                <span class="icon icon-l">
                    <i class="fa fa-file rounded-m bg-blue1-dark mb-3 mr-3"></i>
                </span>
                <div class="d-inline">
                    <h1 class="d-inline"><?=$countBelum?></h1>
                    <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Laporan Belum Selesai</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-style rounded-0">
            <div class="content d-flex">
                <span class="icon icon-l">
                    <i class="fa fa-file rounded-m bg-green1-dark mb-3 mr-3"></i>
                </span>
                <div class="d-inline">
                    <h1><?=$countSelesai?></h1>
                    <h5 class="mb-n1 font-14 line-height-s font-600 color-theme">Laporan Selesai</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-style rounded-0">
            <div class="content d-flex">
                <span class="icon icon-l">
                    <i class="fa fa-file rounded-m bg-red1-dark mb-3 mr-3"></i>
                </span>
                <div class="d-inline">
                    <h1><?=$countArsip?></h1>
                    <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Laporan Diarsipkan</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="card card-style rounded-0">
            <div class="content d-flex">
                <span class="icon icon-l">
                    <i class="fa fa-users rounded-m bg-yellow1-dark mb-3 mr-3"></i>
                </span>
                <div class="d-inline">
                    <h1><?=$countKasus?></h1>
                    <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Jenis Kasus</h5>
                </div>
            </div>
        </div>
    </div>

</div>
