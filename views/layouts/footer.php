<?php

use yii\helpers\Url;
?>

<div id="footer-bar" class="footer-bar-5">
    <a href="<?=Url::to(['/laporan/buat'])?>" class="<?=isset($this->title) ? $this->title == "Buat Laporan" ? 'active-nav' : '' : '' ?>"><i data-feather="edit-2" data-feather-line="1" data-feather-size="21" data-feather-color="red2-dark" data-feather-bg="red2-fade-light"></i><span>Buat</span></a>
    <a href="<?=Url::to(['/laporan/cek'])?>" class="<?=isset($this->title) ? $this->title == "Cek Laporan" ? 'active-nav' : '' : '' ?>"><i data-feather="search" data-feather-line="1" data-feather-size="21" data-feather-color="green1-dark" data-feather-bg="green1-fade-light"></i><span>Cek</span></a>
    <a href="<?=Url::to(['/site/index'])?>" class="<?=isset($this->title) ? $this->title == "Home" ? 'active-nav' : '' : '' ?>"><i data-feather="home" data-feather-line="1" data-feather-size="21" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-light"></i><span>Home</span></a>
    <a href="https://dpppa.labura.go.id/" class="<?=isset($this->title) ? $this->title == "Berita" ? 'active-nav' : '' : '' ?>"><i data-feather="file" data-feather-line="1" data-feather-size="21" data-feather-color="brown1-dark" data-feather-bg="brown1-fade-light"></i><span>Berita</span></a>
    <a href="<?=Url::to(['/site/tentang'])?>"  class="<?=isset($this->title) ? $this->title == "Tentang" ? 'active-nav' : '' : '' ?>"><i data-feather="alert-circle" data-feather-line="1" data-feather-size="21" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-light"></i><span>Tentang</span></a>
</div>