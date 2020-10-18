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
 
    <?=$this->render('admin_header.php')?>
 
    <div class="page-content">

        <div class="page-title page-title-small">
            <h2>
                <a href='#' data-back-button><i class='fa fa-arrow-left'></i></a>
                <?=$this->title?>
            </h2>
            <a href="#" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="<?=Url::to(['images/avatars/5s.png'])?>"></a>
        </div>

        <?= $content; ?>
        
    </div>
 
</div>    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
