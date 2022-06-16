<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */

$this->title = 'Actualizar: '.$model->codigo.' - '.$model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventarios-update">
    
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelAreas'=>$modelAreas,
        'arrayTieneIva'=>$arrayTieneIva,
    ]) ?>

</div>
