<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Inventarios;

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
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta Seguro de Eliminar este Item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Lista', ['index'], ['class' => 'btn btn-info']) ?>
    </p>
    <!--  
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
    -->
    <?php $arrayTieneIva = ["0"=>"NO","1"=>"SI",]?>
    <table class="table table-striped"> 
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio Costo</th>
              <th scope="col">Precio Venta</th>
              <th scope="col">Porc. Aumento</th>
              <th scope="col">Tiene IVA</th>
              <th scope="col">Area</th>
              
            </tr>

            <tr>
              <td><?=$model->codigo ?></td>
              <td><?=$model->nombre?></td>
              <td><?=$model->precos?></td>
              <td><?=$model->preven?></td>
              <td><?=$model->porc_aut_venta.'%'?></td>
              <td><?=$arrayTieneIva[$model->tiene_iva] ?></td>                        
              <td><?=$model->area->nombre_area?></td>
            </tr>
    </table>
    

</div>
