<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="manifest" href="/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="/app/icons/icon-192x192.png">
    <?php $this->head() ?>
</head>
<body class="theme-light" data-background="none" data-highlight="blue2">
<?php $this->beginBody() ?>

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
 
<div id="page">
 
    <?=$this->render('header.php')?>
 
    <div class="page-content">

            <center>
                <img src="<?=Url::to(['images/logo-banner.jpg'])?>" style="background-position:center; object-fit:cover; height:100px;" alt="Logo Banner">
            </center>

        <?php if($this->title != "Home"): ?>

            <div class="card card-style">
                <div class="content">
                    <h2 class="color-highlight">
                        <?=isset($this->title) ? $this->title : "Laker Labura"?>
                    </h2>
                </div>
            </div>

        <?php endif ?>

        <?=$content?>
        
    </div>
    <!-- end of page content -->

    <?=$this->render('footer.php')?>
 
    <!-- Off Canvas Elements Here -->
 
</div>    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
