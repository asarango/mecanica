<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mecanico */

$this->title = 'Create Mecanico';
$this->params['breadcrumbs'][] = ['label' => 'Mecanicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mecanico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
