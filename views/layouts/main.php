<?php
/** @var yii\web\View $this */

/** @var string $content */
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <?php $this->registerCsrfMetaTags() ?>
        <title>ChevyTech</title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100" style="overflow-x: hidden">
        <?php $this->beginBody() ?>

        <header>
            <?php
            NavBar::begin([
                'brandLabel' => '<img src="../imagenes/logo/logo-chevytech.jpg" width="30px"> ChevyTech',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => 'Promociones', 'url' => ['/site/about']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],

                    !Yii::$app->user->isGuest ? (
                        [
                            'label' => 'Orden de trabajo',
                            'items' => [
                                 ['label' => 'Crear Orden', 'url' => ['/cabecera-orden-trabajo/index']],
                                 ['label' => 'Egreso de Bodega', 'url' => '#'],
                            ],
                        ]  
                    ): '',

                    Yii::$app->user->isGuest ? (
                            
                            ['label' => 'Login', 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->nickname . ')',
                                    ['class' => 'btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                            ),                              
                ],
            ]);
            NavBar::end();
            ?>
        </header>

        <main role="main" class="flex-shrink-0" style="margin-top: 70px; margin-bottom: 70px;">
            <div>
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <div class="container">
                    <?= $content ?>
                </div>                
            </div>
        </main>

        <footer class="mt-auto py-3 text-muted" style="background: black">
            <div class="row">                
                <div class="col-md-3 text-center">
                    <h4>TALLER CHEVYTECH</h4>
                    <img src="../imagenes/logo/logo-chevytech.jpg" width="80px">
                    <hr>
                    <p style="text-align: justify">
                        Tu vehículo en las mejores manos, contamos con X años de experiencia, te esperamos en nuestro taller.
                    </p>
                </div>
                <div class="col-md-3">
                    <div>
                        <h4><i class="fas fa-map-marker-alt" style="color: red; font-size:18px"></i> Dirección:</h4>
                        <p>
                            De Las Fucsias  N49-202 y De Las Hiedras (El Inca)
                        </p>
                    </div>
                    <div>
                        <h4><i class="fas fa-mobile-alt" style="color:red; font-size:18px"></i> Teléfono:</h4>
                        <p> 
                            +593 98 987 2321
                        </p>
                    </div>
                    <div>
                        <h4><i class="fas fa-envelope" style="color:red; font-size:18px"></i>  Correo electrónico:</h4>
                        <p>
                            infochevytech@hotmail.com
                        </p>
                    </div>
                    <div>
                        <h4><i class="fas fa-clock" style="color:red; font-size:18px"></i> Horarios de atención:</h4>
                        <p>
                            <strong>LUNES-VIERNES</strong>
                        <p>08h00 - 17h00</p>
                        <strong>SÁBADOS</strong>
                        <p>08h00 - 13h00</p>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <h4>Ubicación</h4>
                    <hr>
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.805015609614!2d-78.47155658605374!3d-0.14796679989203854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d590018a8441cb%3A0x48e8d68f7604d23!2sChevy%20Tech!5e0!3m2!1ses!2sec!4v1652545760397!5m2!1ses!2sec" 
                                style="border:0;" allowfullscreen="" height="250px"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4 style="text-align: center">Contacto</h4>
                    <div>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Teléfono</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo electrónico</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Comentarios</label>
                                <textarea type="text" rows="3" class="form-control" id="exampleInputPassword1"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


            <div style="background-color: white !important; color: white">
                <div>
                    <p class="float-left">&copy; My Company <?= date('Y') ?></p>
                    <p class="float-right"><?= Yii::powered() ?></p>
                </div>
            </div>

        </footer>

        <?php $this->endBody() ?>
        

    </body>
</html>
<?php $this->endPage() ?>
