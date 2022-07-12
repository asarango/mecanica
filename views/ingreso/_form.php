<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ingreso */
/* @var $form yii\widgets\ActiveForm */

$today = date('Y-m-d');
$user = Yii::$app->user->identity->username;
?>

<div class="ingreso-form">
    <?php $form = ActiveForm::begin(); ?>


    <!-- div que muestra leyendas -->
    <div class="row">

        <div class="col-md-6 col-sm-6">
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'subtotal')->hiddenInput(['value' => '0'])->label(false);
            } else {
                echo $form->field($model, 'subtotal')->textInput();
            }
            ?>

        </div>

        <div class="col-md-6 col-sm-6">
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'porc_iva')->hiddenInput(['value' => '0'])->label(false);
            } else {
                echo $form->field($model, 'porc_iva')->textInput();
            }
        ?>
        </div>
        <div class="col-md-6 col-sm-6">
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'val_iva')->hiddenInput(['value' => '0'])->label(false);
            } else {
                echo $form->field($model, 'val_iva')->textInput();
            }
            ?>

        </div>
        <div class="col-md-6 col-sm-6">
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'porc_descuento')->hiddenInput(['value' => '0'])->label(false);
            } else {
                echo $form->field($model, 'porc_descuento')->textInput();
            }
            ?>
        </div>

        <div class="col-md-6 col-sm-6">
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'val_descuento')->hiddenInput(['value' => '0'])->label(false);
            } else {
                echo $form->field($model, 'val_descuento')->textInput();
            }
            ?>

        </div>


    </div>


    <!-- Div que muestra forms -->
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'fecha_ingreso')->textInput(['value' => $today, 'type' => 'date']);
            } else {
                echo $form->field($model, 'fecha_ingreso')->textInput();
            }
            ?>
        </div>


        <div class="col-md-6 col-sm-6">
            <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 col-sm-6">
                <?php
                if ($model->isNewRecord) {
                    echo $form->field($model, 'estado')->hiddenInput(['value' => 'CREANDO'])->label(false);
                } else {
                    echo $form->field($model, 'estado')->textInput(['maxlength' => true]);
                }
                ?>
        </div>

        <div class="col-md-6 col-sm-6">
            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'obs_estado')->hiddenInput(['maxlength' => true])->label(false);
            } else {
                echo $form->field($model, 'obs_estado')->textInput(['maxlength' => true]);
            }
            ?>
        </div>

    </div>
        
        <?php
        if($model->isNewRecord){
            echo $form->field($model, 'creado_por')->hiddenInput(['value' => $user])->label(false);
        }else{
            echo $form->field($model, 'creado_por')->hiddenInput()->label(false);
        }
        ?>

        <?php
            if($model->isNewRecord){
                echo $form->field($model, 'fecha_creacion')->hiddenInput(['value' => $today])->label(false);
            }else{
                echo $form->field($model, 'fecha_creacion')->hiddenInput()->label(false);
            }
        ?>

    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>