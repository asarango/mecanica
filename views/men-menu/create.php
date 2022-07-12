<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MenMenu */

$this->title = 'Create Men Menu';
$this->params['breadcrumbs'][] = ['label' => 'Men Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="men-menu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
