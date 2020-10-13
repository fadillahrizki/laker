<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Korban */

$this->title = 'Create Korban';
$this->params['breadcrumbs'][] = ['label' => 'Korbans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korban-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
