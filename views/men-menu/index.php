<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdenTrabajoEgresoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menú Principal';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-trabajo-egreso-index">

    <div class="row">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8">

            <div class="card-dark cuadro-menu" style="height: 100vh;">
                <h6><b><u><?= Html::encode($this->title) ?></u></b></h6>
                <hr>

                <div class="row">
                    <?php
                    foreach($menus as $menu){
                    ?>
                        <div class="col text-center zoom" style="border: solid 1px #3b4352;">

                            <?= 
                                Html::a('<img src="../imagenes/icons/menu/'.$menu['icono']. '">',[$menu['accion_yii']]);
                            ?>                            
                            <br>
                            <?= $menu['nombre'] ?>
                        </div>

                       
                    <?php
                    }
                    ?>

                </div>

            </div>

        </div>
        <div class="col-lg-2 col-md-2"></div>

    </div>





</div>