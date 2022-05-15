<?php

use app\models\Asesor;
use app\models\TipoOrden;
use app\models\Vehiculo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajo */
/* @var $form yii\widgets\ActiveForm */

$today = date('Y-m-d H:i:s');
$userLog = Yii::$app->user->identity->id;
$tipoOrden = TipoOrden::find()->all();
$asesores = Asesor::find()->all();

?>

<div class="cabecera-orden-trabajo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        if($model->isNewRecord){
            echo $form->field($model, 'fecha_ingreso')->widget(DatePicker::className(), [
                // if you are using bootstrap, the following line will set the correct style of the input field
                'options' => [
                    'class' => 'form-control',                                       
                ],
                // ... you can configure more DatePicker properties here
                'value' => $today,
                'dateFormat' => 'yyyy-MM-dd' 
                
            ]);
        }else{
            echo $form->field($model, 'fecha_ingreso')->widget(DatePicker::className(), [
                // if you are using bootstrap, the following line will set the correct style of the input field
                'options' => [
                    'class' => 'form-control',                    
                ],
                // ... you can configure more DatePicker properties here
                'dateFormat' => 'yyyy-MM-dd'
            ]);
        }
    ?>

    <?php
        echo $form->field($model, 'fecha_entrega')->widget(DatePicker::className(),[
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
        'value' => $today
    ]) ?>

    <?php
        $list = ArrayHelper::map($tipoOrden, 'id' ,'nombre'); 
        echo $form->field($model, 'idTipoOrden')->dropDownList($list,[
        'prompt' => 'Seleccione el tipo de orden...'
    ]) ?>

    <?php 
        $vehiculos = vehiculos();
        $list = ArrayHelper::map($vehiculos, 'vehiculo_id', 'cliente');
        echo $form->field($model, 'idVehiculo')->dropDownList($list, [
            'prompt' => 'Seleccione Vehículo...'
        ]);
    ?>

    <?php 
        $list = ArrayHelper::map($asesores, 'id', 'nombre');
        echo $form->field($model, 'idAsesor')->dropDownList($list,[
            'prompt' => 'Seleccione Asesor...'
        ]);
    ?>

    <?= $form->field($model, 'indicaCliente')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'kilometraje')->textInput() ?>

    <?php //$form->field($model, 'fotoIngresoVehiculo')->textarea(['rows' => 6]) ?>

    <?php //$form->field($model, 'fotoSalidaVehiculo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'esAbierta')->checkbox() ?>

    <?php //$form->field($model, 'numero_orden')->textInput() ?>

    <?= $form->field($model, 'diagnostico')->textarea() ?>

    <?= $form->field($model, 'fecha_terminacion_trabajo')->widget(DatePicker::className(),[
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
        'value' => $today
    ]) ?>

    <?php 
        //$form->field($model, 'calificacion')->textInput() 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    function vehiculos(){
        $con = Yii::$app->db;
        $query = 'select v.id as vehiculo_id , concat(v.placa,'.'\' - \''.', c.nombre) as cliente 
                    ,v.modelo as MODELO,v.anio as ANIO
                    from vehiculo v,cliente c
                    where v."idCliente"  = c.id;';
        $res = $con->createCommand($query)->queryAll();
        return $res;
    }
?>

<script>
    $('#cabeceraordentrabajo-fecha_ingreso').datepicker();
</script>
