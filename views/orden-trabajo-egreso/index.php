<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdenTrabajoEgresoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orden Trabajo Egresos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-trabajo-egreso-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orden Trabajo Egreso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idOrdenTrrabajo',
            'idEgreso',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrdenTrabajoEgreso $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
