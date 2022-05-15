<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Egreso */

$this->title = 'Update Egreso: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Egresos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="egreso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
