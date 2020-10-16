<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terlapor */

$this->title = 'Tambah Terlapor';
$this->params['breadcrumbs'][] = ['label' => 'Terlapors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terlapor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
