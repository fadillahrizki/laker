<?php

use app\models\Laporan;
use yii\helpers\Url;

    $countBaru = Laporan::find()->where(['status'=>"Belum Diproses"])->count();
    $countBelum = Laporan::find()->where(['status'=>"Sedang Diproses"])->count();

    // if (Yii::$app->user->isGuest) {
    //     Yii::$app->response->redirect(Url::to(['site/login'], true));
    // }    

?>
    <div class="header header-fixed header-logo-app">
        <a href="/" class="header-title">LAKER LABURA</a>
        <a href="#" id="btn-sb" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    
    <div id="menu-main" class="menu-box-left bg-white menu-active" style="position:absolute;display:inline-block;" data-menu-width="260">  
         <div class="menu-header">
            <a href="/" class="color-dark1-dark font-900">LAKER LABURA</a>
        </div>

        <div class="menu-logo text-center">
            <a href="#"><img class="rounded-circle bg-highlight" width="80" src="<?=Url::to(['/images/avatars/5s.png']) ?>"></a>
            <h1 class="pt-3 font-800 font-28 text-uppercase"><?=Yii::$app->user->isGuest ? 'Guest' : Yii::$app->user->identity->username?></h1>
        </div>

        <div class="menu-items">
            <h5 class="text-uppercase opacity-20 font-12 pl-3">Menu</h5>
            <a id="nav-welcome" href="/">
                <i data-feather="home" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                <span>Home</span>
                <i class="fa fa-circle"></i>
            </a>

            <a data-submenu="sub-laporan" href="#">
                <i data-feather="file" data-feather-line="1" data-feather-size="16" data-feather-color="brown1-dark" data-feather-bg="brown1-fade-dark"></i>
                <span>Laporan</span>
                
                <i class="fa fa-circle"></i>
            </a>

            <div id="sub-laporan" class="submenu">
                <a href="<?=Url::to(['laporan/baru'])?>">
                    <i class="fa fa-file color-yellow1-dark font-16 opacity-30"></i>
                    <span>Laporan Baru</span>
                    <?php if($countBaru): ?>
                    <strong class="badge bg-highlight color-white"><?=$countBaru?></strong>
                    <?php endif;?>
                    <i class="fa fa-circle"></i>
                </a>
                <a href="<?=Url::to(['laporan/belum-selesai'])?>">
                    <i class="fa fa-file color-blue1-dark font-16 opacity-50"></i>
                    <span>Laporan Belum Selesai</span>
                    <?php if($countBelum): ?>
                    <strong class="badge bg-highlight color-white"><?=$countBelum?></strong>
                    <?php endif;?>
                    <i class="fa fa-circle"></i>
                </a>
                <a href="<?=Url::to(['laporan/selesai'])?>"><i class="fa fa-file color-green1-dark font-16 opacity-30"></i><span>Laporan Selesai</span><i class="fa fa-circle"></i></a>
                <a href="<?=Url::to(['laporan/arsip'])?>"><i class="fa fa-file color-red1-dark font-16 opacity-30"></i><span>Laporan Diarsipkan</span><i class="fa fa-circle"></i></a>
            </div>

            <a id="nav-media" href="<?=Url::to(['jenis-kasus/index'])?>">
                <i data-feather="users" data-feather-line="1" data-feather-size="16" data-feather-color="green1-dark" data-feather-bg="green1-fade-dark"></i>
                <span>Jenis Kasus</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-media" href="<?=Url::to(['pengaturan/index'])?>">
                <i data-feather="settings" data-feather-line="1" data-feather-size="16" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-dark"></i>
                <span>Pengaturan</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-media" href="<?=Url::to(['site/change-password'])?>">
                <i data-feather="key" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                <span>Ubah Password</span>
                <i class="fa fa-circle"></i>
            </a>
            <a href="<?=Url::to(['site/logout'])?>">
            <i data-feather="log-out" data-feather-line="1" data-feather-size="16" data-feather-color="red2-dark" data-feather-bg="red2-fade-dark"></i>
                <span>Log Out</span>
            </a>
        </div>
    </div>