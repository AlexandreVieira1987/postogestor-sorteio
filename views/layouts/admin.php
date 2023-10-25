<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\components\adm\assets\AdmAsset;
use yii\helpers\Html;

AdmAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon/android-icon-192x192.png">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?= $this->render('_menu'); ?>

    <div class="container-fluid">
        <?= $content ?>
    </div>
</div>


<div class="message-footer" style="display: none">
    <p></p>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">
            <a target="_blank" href="https://api.whatsapp.com/send?phone=5548988418634&text=Ajuda!!!%20Erro%20no%20site.">Suporte <i class="fa fa-life-ring"></i></a>
        </p>

        <p class="pull-right">Libaps</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
