<?php

use app\models\CabeceraOrdenTrabajo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CabeceraOrdenTrabajoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orden de Trabajo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabecera-orden-trabajo-index card shadow" style="overflow-x: scroll;">

    <div class="card-header">
        <b><u><?= Html::encode($this->title) ?></u></b>
    </div>
    <div class="card-body">
        <p>
            <?= Html::a('<i class="fa-solid fa-file-plus-minus"> Crear OT</i>', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                

                'id',
                'fecha_ingreso',
                'fecha_entrega',
                'idTipoOrden',
                'idVehiculo',
                //'idAsesor',
                //'kilometraje',
                //'fotoIngresoVehiculo:ntext',
                //'fotoSalidaVehiculo:ntext',
                //'esAbierta:boolean',
                //'numero_orden',
                //'fecha_terminacion_trabajo',
                //'calificacion',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, CabeceraOrdenTrabajo $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>

    </div>
</div>