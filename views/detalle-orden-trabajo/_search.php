<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleOrdenTrabajoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-orden-trabajo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idCabOrden') ?>

    <?= $form->field($model, 'idTrabajosARealizar') ?>

    <?= $form->field($model, 'seRealizo')->checkbox() ?>

    <?= $form->field($model, 'subtotal') ?>

    <?php // echo $form->field($model, 'iva') ?>

    <?php // echo $form->field($model, 'porc_descuento') ?>

    <?php // echo $form->field($model, 'descuento') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'comentarios') ?>

    <?php // echo $form->field($model, 'idMecanico') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
