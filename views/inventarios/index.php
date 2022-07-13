<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Inventarios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Inventarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    
  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'codigo',
            'nombre',
            'precos',
            'preven',
            //'tiene_iva',
            //'id_area',
            //'porc_aut_venta',
            [
                'label'=>'Tiene IVA',
                'class' => 'yii\grid\DataColumn', // Se puede omitir, ya que es la predefinida .
                'value' => function ($data) {
                        $array = ["0"=>"NO","1"=>"SI"];
                        return $array[$data->tiene_iva]; // $data['name'] para datos de un array, por ejemplo al usar SqlDataProvider.
                  },
             ],
            [
                'label'=>'Area',
                'class' => 'yii\grid\DataColumn', // Se puede omitir, ya que es la predefinida .
                'value' => function ($data) {
                        return $data->area->nombre_area; // $data['name'] para datos de un array, por ejemplo al usar SqlDataProvider.
                  },
             ],
             [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Inventarios $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
              ],
            ],
    ]); ?>

</div>
