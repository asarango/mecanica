<?php

use app\models\DetalleOrdenTrabajo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleOrdenTrabajoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle OT | '.$cabecera['nombre'].' | '.$cabecera['placa'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-orden-trabajo-index">

    <b><u><?= Html::encode($this->title) ?></u></b>

    <p style="margin-top: 10px;">
        <?= Html::a('Create Detalle Orden Trabajo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'idCabOrden',
            //'idTrabajosARealizar',
            [
                'attribute' => 'idTrabajosARealizar',
                'vAlign' => 'top',
                'value' => function($model, $key, $index, $widget) {
                    return $model->idTrabajosARealizar0->nombre;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => $listaTrabajos,
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Seleccione...'],
                'format' => 'raw',
            ],
            'seRealizo:boolean',
            'subtotal',
            //'iva',
            //'porc_descuento',
            //'descuento',
            //'total',
            //'comentarios:ntext',
            //'idMecanico',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DetalleOrdenTrabajo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
