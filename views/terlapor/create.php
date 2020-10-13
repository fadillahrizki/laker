<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Terlapor */

$this->title = 'Create Terlapor';
$this->params['breadcrumbs'][] = ['label' => 'Terlapors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terlapor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
