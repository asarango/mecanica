<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Inventarios;
use app\models\Area;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */
/* @var $form yii\widgets\ActiveForm */



?>

<div class="inventarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row"> 
        <div class="col-4">      
            <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-8"> 
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>
    <div class="row"> 
        <div class="col">       
                <?= $form->field($model, 'precos')->textInput() ?>
        </div>
        <div class="col">
                <?= $form->field($model, 'preven')->textInput() ?>
        </div>
        <div class="col">
                <?= $form->field($model, 'porc_aut_venta')->textInput() ?>  
        </div>
    </div>
    <div class="row"> 
        <div class="col-4">              
                <?= $form->field($model, 'tiene_iva')->dropDownList($arrayTieneIva, ['prompt' => 'Seleccione Uno' ]); ?>  
        </div>
        <div class="col-8">
             <?= $form->field($model, 'id_area')->dropDownList($modelAreas, ['prompt' => 'Seleccione Uno' ]); ?>  
        </div>        
    </div>
    <div class="row">
        
        <div class="col">
            <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
   

    <?php ActiveForm::end(); ?>

</div>
