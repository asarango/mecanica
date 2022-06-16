<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventarios */

$this->title = 'Creación de Item';
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventarios-create">
    <h1><?= Html::encode($this->title) ?></h1>  
    <div class="card">  
        <?= $this->render('_form', [
            'model' => $model,
            'modelAreas'=>$modelAreas,
            'arrayTieneIva'=>$arrayTieneIva,
        ]) ?>
    </div>

</div>
