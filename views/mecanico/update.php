<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mecanico */

$this->title = 'Update Mecanico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mecanicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mecanico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
