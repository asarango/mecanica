<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Egreso */

$this->title = 'Crear Egreso';
$this->params['breadcrumbs'][] = ['label' => 'Egresos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egreso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
