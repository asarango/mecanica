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
        <link rel="stylesheet" href="css/mystiles.css" />
        <?php $this->registerCsrfMetaTags() ?>
        <title>ChevyTech</title>
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100" 
          style="overflow-x: hidden; background-color: #3b4352; 
                color: #b6b6b6; 
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                font-size: 14px;">
        <?php $this->beginBody() ?>
        
        <header>
            <?php
            NavBar::begin([
                'brandLabel' => '<img src="../imagenes/logo/logo-chevytech.jpg" width="20px"> ChevyTech',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
                ],
            ]);
            echo Nav::widget([
                'encodeLabels' => false,
                'options' => ['class' => 'navbar-nav'],
                'items' => [
                    ['label' => '<i class="fas fa-universal-access"></i> Ofertas', 'url' => ['/site/about'], 'title' => ['Promociones']],
                    ['label' => '<i class="fas fa-address-book"></i> Contactos', 'url' => ['/site/contact']],

                    !Yii::$app->user->isGuest ? (
                        // [
                        //     'label' => 'Principal',
                        //     'items' => [
                        //          ['label' => 'Inventarios', 'url' => ['/inventarios/index']],
                        //          ['label' => 'Orden de Trabajo', 'url' => ['/cabecera-orden-trabajo/index']],
                        //          ['label' => 'Egreso Bodega', 'url' => ['/egreso/index']],
                        //          ['label' => 'Ingreso Bodega', 'url' => ['#']],
                        //          ['label' => 'Clientes', 'url' => ['#']],                                 
                        //          ['label' => 'Mecánicos', 'url' => ['#']],
                        //          ['label' => 'Vehículo', 'url' => ['#']],
                        //     ],
                        // ]  
                        ['label' => '<i class="fab fa-elementor"></i> Menú', 'url' => ['/cabecera-orden-trabajo/ot']]
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
                <div class="container" style="margin-bottom: 60px;">                
                    <?= $content ?>
                </div>                
            </div>
        </main>

        <footer class="mt-auto py-3 text-muted" style="background: #343a40; position: fixed; bottom: 0; width: 100%;">
            
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
