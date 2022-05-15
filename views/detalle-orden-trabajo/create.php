<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleOrdenTrabajo */

$this->title = 'Create Detalle Orden Trabajo';
$this->params['breadcrumbs'][] = ['label' => 'Detalle Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-orden-trabajo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
