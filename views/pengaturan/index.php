<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengaturanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengaturan';
$this->params['breadcrumbs'][] = $this->title;

if($success = Yii::$app->session->getFlash("success")):
    ?>
    
    <div class="ml-3 mr-3 alert alert-small rounded-s shadow-xl bg-green1-dark" role="alert">
        <span><i class="fa fa-check"></i></span>
        <strong><?=$success[0]?></strong>
        <button type="button" class="close color-white opacity-60 font-16" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>    

<?php endif; ?>

<div class="pengaturan-index">
    <?= $this->render('_form',['model'=>$model]) ?>

</div>
