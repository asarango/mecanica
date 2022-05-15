<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cabecera-orden-trabajo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'fecha_entrega')->textInput() ?>

    <?= $form->field($model, 'idTipoOrden')->textInput() ?>

    <?= $form->field($model, 'idVehiculo')->textInput() ?>

    <?= $form->field($model, 'idAsesor')->textInput() ?>

    <?= $form->field($model, 'kilometraje')->textInput() ?>

    <?= $form->field($model, 'fotoIngresoVehiculo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fotoSalidaVehiculo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'esAbierta')->checkbox() ?>

    <?= $form->field($model, 'numero_orden')->textInput() ?>

    <?= $form->field($model, 'fecha_terminacion_trabajo')->textInput() ?>

    <?= $form->field($model, 'calificacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
