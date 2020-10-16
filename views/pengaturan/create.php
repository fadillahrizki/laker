<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaturan */

$this->title = 'Tambah Pengaturan';
$this->params['breadcrumbs'][] = ['label' => 'Pengaturans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaturan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
