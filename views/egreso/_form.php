<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Egreso */
/* @var $form yii\widgets\ActiveForm */
$today = date('Y-m-d H:i:s');
$userLog = Yii::$app->user->identity->id;
?>

<div class="egreso-form">

    <?php $form = ActiveForm::begin(); ?>

    <label>Orden Trabajo:</label>
    <input id="orden_trabajo"></input>
    <p></p>

    <?= $form->field($model, 'num_egreso')->textInput() ?>

    <?= $form->field($model, 'fecha_egreso')->widget(DatePicker::className(), [
        'options' => [
            'class' => 'form-control',                                       
        ],
        'value' => $today,
        'dateFormat' => 'yyyy-MM-dd',
        ])?>

    <!-- <?= $form->field($model, 'subtotal')->textInput() ?>

    <?= $form->field($model, 'porc_iva')->textInput() ?>

    <?= $form->field($model, 'val_iva')->textInput() ?>

    <?= $form->field($model, 'porc_descuento')->textInput() ?>

    <?= $form->field($model, 'val_descuento')->textInput() ?>

    <?= $form->field($model, 'creado_por')->textInput(['maxlength' => true]) ?>    

    <?= $form->field($model, 'fecha_creacion')->widget(DatePicker::className(), [
        'options' => [
            'class' => 'form-control',                                       
        ],
        'value' => $today,
        'dateFormat' => 'yyyy-MM-dd',
        ])?> -->

    <?= $form->field($model, 'observacion')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
