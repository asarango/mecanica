<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cabecera Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cabecera-orden-trabajo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fecha_ingreso',
            'fecha_entrega',
            'idTipoOrden',
            'idVehiculo',
            'idAsesor',
            'kilometraje',
            'fotoIngresoVehiculo:ntext',
            'fotoSalidaVehiculo:ntext',
            'esAbierta:boolean',
            'numero_orden',
            'fecha_terminacion_trabajo',
            'calificacion',
        ],
    ]) ?>

</div>
