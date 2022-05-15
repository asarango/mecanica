<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajo */

$this->title = 'Create Cabecera Orden Trabajo';
$this->params['breadcrumbs'][] = ['label' => 'Cabecera Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabecera-orden-trabajo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
