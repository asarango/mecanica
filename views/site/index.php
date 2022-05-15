<?php
/** @var yii\web\View $this */
$this->title = 'ChevyTech';
?>
<div class="site-index animate__animated animate__fadeIn container">

    <div class="row" style="">
        <div class="col-md-12">
            <div id="carouselExampleInterval"  class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../imagenes/slider-1.png" class="d-block w-100" alt="..." width="720px" height="480px">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/slider-2.png" class="d-block w-100" alt="..." width="720px" height="480px">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/slider-3.png" class="d-block w-100" alt="..." width="720px" height="480px">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>

        </div>
    </div>

    <div class="body-content" style="margin-top: 30px;">

        <div class="jumbotron text-center card shadow">
            <h3 class="">16 AÑOS A SU SERVICIO</h3>
            <hr>
            <h1 class="display-4">
                ChevyTech
                <img src="../imagenes/logo/logo-chevytech.jpg">
            </h1>

            <p class="lead">¡Mantenimiento y arreglo de todas las marcas de vehículos!</p>

        </div>

        <div class="jumbotron text-center card shadow">
            <h2>QUIENES SOMOS</h2>

            <p style="text-align: justify">
                Su taller de confianza para reparaciones de todo tipo. 
                Su seguridad dentro del vehículo sólo está garantizada cuando el automóvil no presenta ningún problema 
                técnico durante los trayectos. Por eso, además de proporcionarle 
                servicios de asistencia, le ofrecemos un servicio completo de inspecciones de seguridad.
            </p>

            <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
        </div>


        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="jumbotron text-center card shadow">
                    <h2>NUESTROS SERVICIOS</h2>
                    <div class="row p-5">
                        <div class="jumbotron col-md-4 card text-center" style="border-radius: 0; box-shadow: 5px 10px 20px -10px #343a40 ">
                            <h3>GRUA</h3>
                            <div><img src="../imagenes/foto3.jpg" width="100%" ></div>
                        </div>
                        <div class="jumbotron col-md-4 card text-center" style="border-radius: 0; box-shadow: 5px 10px 20px -10px #343a40 ">
                            <h3>AUTOMOTRIZ</h3>
                            <div><img src="../imagenes/foto2.jpg" width="100%" ></div>
                        </div>
                        <div class="jumbotron col-md-4 card text-center" style="border-radius: 0; box-shadow: 5px 10px 20px -10px #343a40 ">
                            <h3>ELÉCTRICO</h3>
                            <div><img src="../imagenes/foto1.jpg" width="100%" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
