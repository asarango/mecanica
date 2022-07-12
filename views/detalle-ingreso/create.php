<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleIngreso */

$this->title = 'Create Detalle Ingreso';
$this->params['breadcrumbs'][] = ['label' => 'Detalle Ingresos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-ingreso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
