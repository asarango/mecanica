<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleOrdenTrabajo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-orden-trabajo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCabOrden')->textInput() ?>

    <?= $form->field($model, 'idTrabajosARealizar')->textInput() ?>

    <?= $form->field($model, 'seRealizo')->checkbox() ?>

    <?= $form->field($model, 'subtotal')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'porc_descuento')->textInput() ?>

    <?= $form->field($model, 'descuento')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'comentarios')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'idMecanico')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
