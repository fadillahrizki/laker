<?php

use yii\helpers\Url;
?>
    <div class="header header-fixed header-auto-show header-logo-app">
        <a href="/" class="header-title">LAKER LABURA</a>
        <!-- <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a> -->
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    
    <div class="card header-card shape-rounded" data-card-height="150">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="<?=Url::to(['images/pictures/20s.jpg'])?>"></div>
    </div>