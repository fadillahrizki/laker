<?php

use yii\helpers\Url;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="<?=Url::to(['css/bootstrap.css'])?>">
<link rel="stylesheet" type="text/css" href="<?=Url::to(['css/style.css'])?>">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?=Url::to(['fonts/css/fontawesome-all.min.css'])?>">    
<link rel="apple-touch-icon" sizes="180x180" href="<?=Url::to(['app/icons/icon-192x192.png'])?>">
</head>
    
<body class="theme-light" data-highlight="blue2">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">

    <div class="page-content">
        
        <div class="page-title page-title-small">
            <h2>Sign In</h2>
            
        </div>
        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
            <div class="carda-bg preload-img" data-src="images/pictures/20s.jpg"></div>
        </div>
        
        <div class="card card-style">
            <div class="content mt-2 mb-0">
                <div class="input-style has-icon input-style-1 input-required pb-1">
                    <i class="input-icon fa fa-user color-theme"></i>
                    <span>Username</span>
                    <em>(required)</em>
                    <input type="name" placeholder="Username">
                </div> 
                <div class="input-style has-icon input-style-1 input-required pb-1">
                    <i class="input-icon fa fa-lock color-theme"></i>
                    <span>Password</span>
                    <em>(required)</em>
                    <input type="name" placeholder="Password">
                </div> 

                <a href="#" class="btn btn-m mt-2 mb-4 btn-full bg-green1-dark rounded-sm text-uppercase font-900">Login</a>

                <div class="divider"></div>

                <a href="#" class="btn btn-icon btn-m btn-full shadow-l bg-facebook text-uppercase font-900 text-left"><i class="fab fa-facebook-f text-center"></i>Login with Facebook</a>
                <a href="#" class="btn btn-icon btn-m mt-2 btn-full shadow-l bg-twitter text-uppercase font-900 text-left"><i class="fab fa-twitter text-center"></i>Login with Twitter</a>

                <div class="divider mt-4 mb-3"></div>

                <div class="d-flex">
                    <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-left"><a href="#" class="color-theme">Create Account</a></div>
                    <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-right"><a href="#" class="color-theme">Forgot Credentials</a></div>
                </div>
            </div>
            
        </div>
    </div>    
    <!-- end of page content-->
    
</div>


<script type="text/javascript" src="<?=Url::to(['js/jquery.js'])?>"></script>
<script type="text/javascript" src="<?=Url::to(['js/bootstrap.min.js'])?>"></script>
<script type="text/javascript" src="<?=Url::to(['js/custom.js'])?>"></script>
</body>
