<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Inventarios;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precos')->textInput() ?>

    <?= $form->field($model, 'preven')->textInput() ?>

    <?= $form->field($model, 'porc_aut_venta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
