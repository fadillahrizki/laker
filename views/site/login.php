<?php

use yii\widgets\ActiveForm;

$this->title = "Login Siokap Labura";

$form = ActiveForm::begin();

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

    <div class="card card-style text-center mx-auto mt-5" style="width:350px">
        <div class="content">
            <img width="100" src="<?=Url::to(['/images/logo-only.png']) ?>">
            <h2>SIOKAP LABURA</h2>
        </div>
    </div>

    <div class="card card-style m-auto" style="width:350px">
        <div class="content mt-2 mb-0">
            <?= $form->field($model,'username')->textInput() ?>
            <?= $form->field($model,'password')->passwordInput() ?>
            <?= $form->field($model,'rememberMe')->checkbox() ?>

            <button class="btn btn-m mt-2 mb-4 btn-full btn-block bg-green1-dark rounded-sm text-uppercase font-900">Login</button>
        </div>
        
    </div>
 
</div>    
<?php ActiveForm::end() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>