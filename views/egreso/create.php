<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Egreso */

$this->title = 'Creación Egreso';
$this->params['breadcrumbs'][] = ['label' => 'Egresos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egreso-create">

    <b><u><?= Html::encode($this->title) ?></b></u>
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
