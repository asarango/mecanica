<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetalleIngresoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Ingresos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-ingreso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Detalle Ingreso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idIngreso',
            'idInventario',
            'nombreItem',
            'cantidad',
            //'precio',
            //'porc_iva',
            //'iva',
            //'porc_descuento',
            //'descuento',
            //'total',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DetalleIngreso $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
