<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Egreso */
/* @var $form yii\widgets\ActiveForm */

//Busca el maximo Egreso + 1, para desplegar
$ultimo_num_egr = (new \yii\db\Query())
->from('egreso')
->max('id');

$fecha_actual = date('Y-m-d'); 
$user = Yii::$app->user->identity->username;
?>

<div class="egreso-form ">

    <?php $form = ActiveForm::begin(); ?>     
    
    <?php
    if($model->isNewRecord)
    {
         echo 'Secuencial : '.$ultimo_num_egr+1;

         echo $form->field($model, 'fecha_egreso')->textInput(['type'=>'date','value'=>$fecha_actual]);

         echo $form->field($model, 'observacion')->textArea(['rows' => 3]);

         echo $form->field($model, 'subtotal')->hiddenInput(['value'=>0])->label(false);

         echo $form->field($model, 'porc_iva')->hiddenInput(['value'=>0])->label(false);
    
         echo $form->field($model, 'val_iva')->hiddenInput(['value'=>0])->label(false);
     
         echo $form->field($model, 'porc_descuento')->hiddenInput(['value'=>0])->label(false);
     
         echo $form->field($model, 'val_descuento')->hiddenInput(['value'=>0])->label(false);
     
         echo $form->field($model, 'creado_por')->hiddenInput(['maxlength' => true,'value'=>$user])->label(false);
     
         echo $form->field($model, 'fecha_creacion')->hiddenInput(['value'=>$fecha_actual])->label(false) ;
     
         echo $form->field($model, 'estado')->hiddenInput(['maxlength' => true,'value'=>'CREANDO'])->label(false);
    
         echo $form->field($model, 'obs_estado')->hiddenInput(['maxlength' => true,'value'=>''])->label(false) ;
     
         

    }else{    
        echo 'Secuencial :'.$model->id;
        echo $form->field($model, 'fecha_egreso')->textInput(['type'=>'date-time']);

        echo $form->field($model, 'observacion')->textInput(['maxlength' => true]);

        echo $form->field($model, 'subtotal')->hiddenInput()->label(false);

        echo $form->field($model, 'porc_iva')->hiddenInput()->label(false);
   
        echo $form->field($model, 'val_iva')->hiddenInput()->label(false);
    
        echo $form->field($model, 'porc_descuento')->hiddenInput()->label(false);
    
        echo $form->field($model, 'val_descuento')->hiddenInput()->label(false);
    
        echo $form->field($model, 'creado_por')->hiddenInput(['maxlength' => true])->label(false);
    
        echo $form->field($model, 'fecha_creacion')->hiddenInput()->label(false) ;
    
        echo $form->field($model, 'estado')->hiddenInput(['maxlength' => true])->label(false);
   
        echo $form->field($model, 'obs_estado')->hiddenInput(['maxlength' => true])->label(false) ;
    
        }
    ?>
   
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
