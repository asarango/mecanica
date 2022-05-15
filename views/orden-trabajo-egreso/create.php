<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenTrabajoEgreso */

$this->title = 'Create Orden Trabajo Egreso';
$this->params['breadcrumbs'][] = ['label' => 'Orden Trabajo Egresos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-trabajo-egreso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
