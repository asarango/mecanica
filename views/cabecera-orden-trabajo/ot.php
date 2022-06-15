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
        <div class="col-lg-8 col-md-8">

            <div class="card-dark" style="margin-bottom: 15px;overflow-y: scroll; height: 70vh;">
                <h6><b><u><?= Html::encode($this->title) ?></u></b></h6>
                <hr>

                <div class="row">
                    <?php
                    for ($i = 0; $i < 30; $i++) {
                    ?>
                        <div class="col" style="border: solid 1px #3b4352;">
                            <img src="../imagenes/icons/menu/repuesto.png">
                            <br>
                            menu-ordenes
                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>

        </div>


        <div class="col-lg-4 col-md-4">
            <div class="row card-color-fuccia">
                <h6><b><u><?= Html::encode($this->title) ?></u></b></h6>
                <p>
                    Puede seleccionar una opción del menú para realizar sus actividades diarias.
                    Si usted necesita acceso a otra opción de menú, por favor comuníquese con su gerente para
                    realizar el trámite de verifiación de permisos.
                </p>
            </div>

            <div class="row card-color-azul" style="margin-top: 5px;">
                <h6><b><u>Soporte:</u></b></h6>
                <p>
                    <b>Primer nivel:</b><br>
                    Persona encaragada de la aplicación en el taller
                </p>
            </div>

        </div>

    </div>





</div>