<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */

$this->title = 'Código: '.$model->codigo.' - Item:'.$model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inventarios-view">

    <h2>DATOS DE:</h2>
    <h3><?= Html::encode($this->title) ?></h3>
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta Seguro de Eliminar este Item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [   
            'precos',
            'preven',
            'porc_aut_venta',
            'tiene_iva',
            'id_area',
        ],
    ]) ?>

</div>
