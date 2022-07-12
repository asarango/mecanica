<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IngresoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ingreso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_ingreso') ?>

    <?= $form->field($model, 'subtotal') ?>

    <?= $form->field($model, 'porc_iva') ?>

    <?= $form->field($model, 'val_iva') ?>

    <?php // echo $form->field($model, 'porc_descuento') ?>

    <?php // echo $form->field($model, 'val_descuento') ?>

    <?php // echo $form->field($model, 'creado_por') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'obs_estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
