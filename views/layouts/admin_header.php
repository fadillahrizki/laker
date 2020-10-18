
        <?php

use yii\helpers\Url;
?>
    <div class="header header-fixed header-auto-show header-logo-app">
        <a href="/" class="header-title">LAKER LABURA</a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    
    <div class="card header-card" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="<?=Url::to(['images/pictures/20s.jpg'])?>"></div>
    </div>

    <div id="menu-main" class="menu menu-box-right menu-box-detached" data-menu-width="260" data-menu-active="nav-welcome" data-menu-effect="menu-over">  
         <div class="menu-header">
            <a href="#" class="close-menu border-right-0"><i class="fa font-12 color-red2-dark fa-times"></i> Tutup</a>
        </div>

        <div class="menu-logo text-center">
            <a href="#"><img class="rounded-circle bg-highlight" width="80" src="/images/avatars/5s.png"></a>
            <h1 class="pt-3 font-800 font-28 text-uppercase">Adminnya</h1>
            <p class="font-11 mt-n2">Put a little <span class="color-highlight">color</span> in your life.</p>
        </div>

        <div class="menu-items">
            <h5 class="text-uppercase opacity-20 font-12 pl-3">Menu</h5>
            <a id="nav-welcome" href="/">
                <i data-feather="home" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                <span>Home</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-laporan" href="<?=Url::to(['laporan/index'])?>">
                <i data-feather="file" data-feather-line="1" data-feather-size="16" data-feather-color="brown1-dark" data-feather-bg="brown1-fade-dark"></i>
                <span>Laporan</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-media" href="<?=Url::to(['pelapor/index'])?>">
                <i data-feather="users" data-feather-line="1" data-feather-size="16" data-feather-color="green1-dark" data-feather-bg="green1-fade-dark"></i>
                <span>Pelapor</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-media" href="<?=Url::to(['korban/index'])?>">
                <i data-feather="users" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                <span>Korban</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-media" href="<?=Url::to(['terlapor/index'])?>">
                <i data-feather="users" data-feather-line="1" data-feather-size="16" data-feather-color="red2-dark" data-feather-bg="red2-fade-dark"></i>
                <span>Terlapor</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-media" href="<?=Url::to(['arsip/index'])?>">
                <i data-feather="mail" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                <span>Arsip</span>
                <i class="fa fa-circle"></i>
            </a>
            <a id="nav-media" href="<?=Url::to(['pengaturan/index'])?>">
                <i data-feather="settings" data-feather-line="1" data-feather-size="16" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-dark"></i>
                <span>Pengaturan</span>
                <i class="fa fa-circle"></i>
            </a>
            <a href="#">
            <i data-feather="log-out" data-feather-line="1" data-feather-size="16" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-dark"></i>
                <span>Log Out</span>
            </a>
        </div>

        <div class="text-center pt-2">
            <a href="#" class="icon icon-xs mr-1 rounded-s bg-facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" class="icon icon-xs mr-1 rounded-s bg-twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="icon icon-xs mr-1 rounded-s bg-instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" class="icon icon-xs mr-1 rounded-s bg-linkedin"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="icon icon-xs rounded-s bg-whatsapp"><i class="fab fa-whatsapp"></i></a>
            <p class="mb-0 pt-3 font-10 opacity-30">Copyright <span class="copyright-year"></span> Enabled. All rights reserved</p>
        </div>
    </div>