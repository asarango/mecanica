<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Egreso;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgresoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egresos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egreso-index card shadow" style="overflow-x: scroll;">

<div class="card-header">
     <b><u><?= Html::encode($this->title) ?></b></u>
    </div>
    <div class="card-body">

    <p>
        <?= Html::a('Crear Egreso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'num_egreso',
            'fecha_egreso',
            'subtotal',
            'porc_iva',
            'val_iva',
            'porc_descuento',
            'val_descuento',
            //'creado_por',
            //'fecha_creacion',
            'observacion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Egreso $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>
</div>

</div>
