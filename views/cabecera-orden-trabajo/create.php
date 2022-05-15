<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CabeceraOrdenTrabajo */

$this->title = 'Create Cabecera Orden Trabajo';
$this->params['breadcrumbs'][] = ['label' => 'Cabecera Orden Trabajos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabecera-orden-trabajo-create">

    <b><u><?= Html::encode($this->title) ?></u></b>

    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6 card shadow p-3">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

        </div>
        <div class="col-lg-3 col-md-3"></div>
    </div>

    

</div>
