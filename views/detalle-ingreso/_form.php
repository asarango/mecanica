<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleIngreso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-ingreso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idIngreso')->textInput() ?>

    <?= $form->field($model, 'idInventario')->textInput() ?>

    <?= $form->field($model, 'nombreItem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'porc_iva')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'porc_descuento')->textInput() ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
