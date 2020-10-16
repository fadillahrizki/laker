<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korban */

$this->title = 'Tambah Korban';
$this->params['breadcrumbs'][] = ['label' => 'Korbans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korban-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
