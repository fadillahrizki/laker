
        <?php

use yii\helpers\Url;
?>
    <nav class="navbar navbar-default bg-white shadow">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    LAKER LABURA
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- <li class="active"> -->
                <li>
                    <a href="<?=Url::to(['/'])?>">
                        <i data-feather="home" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Url::to(['laporan/index'])?>">
                        <i data-feather="file" data-feather-line="1" data-feather-size="16" data-feather-color="brown1-dark" data-feather-bg="brown1-fade-dark"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Url::to(['pelapor/index'])?>">
                        <i data-feather="users" data-feather-line="1" data-feather-size="16" data-feather-color="green1-dark" data-feather-bg="green1-fade-dark"></i>
                        <span>Pelapor</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Url::to(['korban/index'])?>">
                        <i data-feather="users" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                        <span>Korban</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Url::to(['terlapor/index'])?>">
                        <i data-feather="users" data-feather-line="1" data-feather-size="16" data-feather-color="red2-dark" data-feather-bg="red2-fade-dark"></i>
                        <span>Terlapor</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Url::to(['arsip/index'])?>">
                        <i data-feather="mail" data-feather-line="1" data-feather-size="16" data-feather-color="blue2-dark" data-feather-bg="blue2-fade-dark"></i>
                        <span>Arsip</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Url::to(['pengaturan/index'])?>">
                        <i data-feather="settings" data-feather-line="1" data-feather-size="16" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-dark"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i data-feather="log-out" data-feather-line="1" data-feather-size="16" data-feather-color="gray2-dark" data-feather-bg="gray2-fade-dark"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>