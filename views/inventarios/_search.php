<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InventariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'precos') ?>

    <?= $form->field($model, 'preven') ?>

    <?php // echo $form->field($model, 'porc_aut_venta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
