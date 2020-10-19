<?php 

$this->title = "Login"
?>

<div class="card card-style text-center mx-auto" style="width:350px">
    <div class="content">
        <h2><?=$this->title?></h2>
    </div>
</div>

<div class="card card-style m-auto" style="width:350px">
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