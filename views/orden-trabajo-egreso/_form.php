<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenTrabajoEgreso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-trabajo-egreso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idOrdenTrrabajo')->textInput() ?>

    <?= $form->field($model, 'idEgreso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
