<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\components\ConfigSite;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$base = AppAsset::register($this);

$this->registerCssFile($base->baseUrl . '/css/colors.css');
$this->registerJs('__global()');

$nome = Yii::$app->session->get('posto_slug');
$promocao = Yii::$app->session->get('promocao_slug');

$host = Yii::$app->params['host'];
$logo = $host . '/web/images/' . $nome . '/' . Yii::$app->session->get('posto_logo');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">

<!--    <meta name="google-site-verification" content="IBxwO5a4h2dN7x0kOObskfyGljZZ2XDa8Nulba8sYFA" />-->

    <!-- Global site tag (gtag.js) - Google Analytics -->
<!--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y5W17TQLWC"></script>-->
    <script>
        // window.dataLayer = window.dataLayer || [];
        // function gtag(){dataLayer.push(arguments);}
        // gtag('js', new Date());
        //
        // gtag('config', 'G-Y5W17TQLWC');
    </script>

    <style type="text/css">

        @media screen and (max-width: 700px){
            .images {
                max-height: 500px;
                width: 100%;
            }
        }

        @media screen and (min-width: 700px){
            .images {
                height: 500px;
            }
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fahkwang:wght@200&family=Montserrat:wght@200&Libre+Franklin&family=Tenor+Sans&display=swap" rel="stylesheet">


    <link rel="canonical" href="<?= ArrayHelper::getValue(Yii::$app->params, 'host') ?>">
    <meta name="description" content="<?=ConfigSite::getDescription() ?>">
    <meta name="keywords" content="<?= ConfigSite::getKeyWords()?>"/>
    <meta name="title" content="<?= ConfigSite::getTitle()?>"/>
    <meta name="resource-type" content="document">
    <meta name="classification" content="Internet">
    <meta name="robots" content="all">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="language" content="en">
    <meta name="doc-class" content="Completed">
    <meta name="doc-rights" content="Public">

    <meta name="author" content="<?= ConfigSite::getDescription()?>" />
    <meta name="reply-to" content="<?= ConfigSite::getEmail()?>" />
    <meta name="publisher" content="<?= ConfigSite::getTitle()?>">

    <meta name="robots" content="">

    <link rel="icon" type="image/png" sizes="32x32" href="<?= $host ?>/web/images/logo.png">

    <meta name="msapplication-TileColor" content="#ffffff">

    <link rel="apple-touch-icon" sizes="57x57" href="<?= $host ?>/web/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $host ?>/web/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $host ?>/web/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $host ?>/web/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $host ?>/web/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $host ?>/web/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $host ?>/web/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $host ?>/web/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $host ?>/web/images/favicon/apple-icon-180x180.png">

    <link rel="manifest" href="<?= $host ?>/web/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <header id="header-container">
        <div class="navbar" style="background: var(--color-blue-1);">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?=Url::to(['site/index'])?>" class="logo flex" style="padding-right: 30px">
                        <img style="height: 100px" src="<?= $logo ?>" alt="<?= ConfigSite::getTitle() ?>">
                    </a>
                </div>
                <nav id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?=Url::to(['site/index', 'slug' => $nome, 'promocao' => $promocao])?>">Início</a></li>
                        <li><a href="<?=Url::to(['regulamento/index', 'slug' => $nome, 'promocao' => $promocao])?>">Regulamento</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="col-sm-12" style="padding: 0">
        <?= $content ?>


        <script type="text/javascript">
            function __global() {
                $('[data-toggle=tooltip]').tooltip()
            }
        </script>
    </div>
</div>


<?= $this->render('_footer') ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
