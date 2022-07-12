<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleIngresoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-ingreso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idIngreso') ?>

    <?= $form->field($model, 'idInventario') ?>

    <?= $form->field($model, 'nombreItem') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'precio') ?>

    <?php // echo $form->field($model, 'porc_iva') ?>

    <?php // echo $form->field($model, 'iva') ?>

    <?php // echo $form->field($model, 'porc_descuento') ?>

    <?php // echo $form->field($model, 'descuento') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
