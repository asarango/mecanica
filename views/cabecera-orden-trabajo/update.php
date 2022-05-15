<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajo */

$this->title = 'Update Cabecera Orden Trabajo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cabecera Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cabecera-orden-trabajo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
