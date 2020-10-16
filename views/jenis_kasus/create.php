<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisKasus */

$this->title = 'Tambah Jenis Kasus';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kasuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-kasus-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
