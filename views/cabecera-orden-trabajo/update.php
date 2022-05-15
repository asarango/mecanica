<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajo */

$this->title = 'Update Cabecera Orden Trabajo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cabecera Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cabecera-orden-trabajo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-3 col-md-3">
            
                <img src="../imagenes/foto_ingreso/placa1_1.jpg" class="img-thumbnail" alt="">
                <img src="../imagenes/foto_ingreso/placa2_1.jpg" class="img-thumbnail" alt="">
                <img src="../imagenes/foto_ingreso/placa2_2.jpg" class="img-thumbnail" alt="">
                
            
        </div>
        <div class="col-lg-6 col-md-6">
        <?= $this->render('_form', [
                'model' => $model,
            ]) 
        ?>
        </div>
        <div class="col-lg-3 col-md-3">
        <?php
            if($model->fecha_terminacion_trabajo){
                ?>
                    <img src="../imagenes/foto_salida/placa1_1.jpeg" class="img-thumbnail" alt="">
                    <img src="../imagenes/foto_salida/placa2_1.jpg" class="img-thumbnail" alt="">
                    <img src="../imagenes/foto_salida/placa2_2.jpg" class="img-thumbnail" alt="">
                <?php
            }
        ?>            
        </div>
    </div>    

</div>
