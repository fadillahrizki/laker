<?php

use app\models\JenisKasus;
use app\models\Laporan;

$countBaru = Laporan::find()->where(['status'=>"Belum Diproses"])->count();
$countBelum = Laporan::find()->where(['status'=>"Sedang Diproses"])->count();
$countArsip = Laporan::find()->where(['status'=>"Diarsipkan"])->count();
$countSelesai = Laporan::find()->where(['status'=>"Selesai"])->count();
$countKasus = JenisKasus::find()->count();

$this->title = "Home"
?>
<div class="jenis-kasus-index row">

<div class="card card-style rounded-0 col-5 mx-auto mb-5">
    <div class="content">
        <span class="icon icon-l">
            <i class="fa fa-file rounded-m bg-yellow1-dark mb-3 mr-3"></i>
            <h1 class="d-inline"><?=$countBaru?></h1>
        </span>
        <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Laporan Baru</h5>
    </div>
</div>

<div class="card card-style rounded-0 col-5 mx-auto mb-5">
    <div class="content">
        <span class="icon icon-l">
            <i class="fa fa-file rounded-m bg-blue1-dark mb-3 mr-3"></i>
            <h1 class="d-inline"><?=$countSelesai?></h1>
        </span>
        <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Laporan Belum Selesai</h5>
    </div>
</div>

<div class="card card-style rounded-0 col-5 mx-auto mb-5">
    <div class="content">
        <span class="icon icon-l">
            <i class="fa fa-file rounded-m bg-green1-dark mb-3 mr-3"></i>
            <h1 class="d-inline"><?=$countSelesai?></h1>
        </span>
        <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Laporan Selesai</h5>
    </div>
</div>

<div class="card card-style rounded-0 col-5 mx-auto mb-5">
    <div class="content">
        <span class="icon icon-l">
            <i class="fa fa-file rounded-m bg-red1-dark mb-3 mr-3"></i>
            <h1 class="d-inline"><?=$countArsip?></h1>
        </span>
        <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Laporan Diarsipkan</h5>
    </div>
</div>

<div class="card card-style rounded-0 col-8 mx-auto mb-5">
    <div class="content">
        <span class="icon icon-l">
            <i class="fa fa-users rounded-m bg-yellow1-dark mb-3 mr-3"></i>
            <h1 class="d-inline"><?=$countKasus?></h1>
        </span>
        <h5 class="mb-n1 font-15 line-height-s font-600 color-theme">Jenis Kasus</h5>
    </div>
</div>

</div>
