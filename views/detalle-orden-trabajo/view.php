<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleOrdenTrabajo */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalle-orden-trabajo-view">

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
            'idCabOrden',
            'idTrabajosARealizar',
            'seRealizo:boolean',
            'subtotal',
            'iva',
            'porc_descuento',
            'descuento',
            'total',
            'comentarios:ntext',
            'idMecanico',
        ],
    ]) ?>

</div>
