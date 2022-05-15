<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cabecera-orden-trabajo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha_ingreso') ?>

    <?= $form->field($model, 'fecha_entrega') ?>

    <?= $form->field($model, 'idTipoOrden') ?>

    <?= $form->field($model, 'idVehiculo') ?>

    <?php // echo $form->field($model, 'idAsesor') ?>

    <?php // echo $form->field($model, 'kilometraje') ?>

    <?php // echo $form->field($model, 'fotoIngresoVehiculo') ?>

    <?php // echo $form->field($model, 'fotoSalidaVehiculo') ?>

    <?php // echo $form->field($model, 'esAbierta')->checkbox() ?>

    <?php // echo $form->field($model, 'numero_orden') ?>

    <?php // echo $form->field($model, 'fecha_terminacion_trabajo') ?>

    <?php // echo $form->field($model, 'calificacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
