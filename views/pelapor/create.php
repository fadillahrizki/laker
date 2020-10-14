<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pelapor */

$this->title = 'Tambah Pelapor';
$this->params['breadcrumbs'][] = ['label' => 'Pelapors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelapor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
