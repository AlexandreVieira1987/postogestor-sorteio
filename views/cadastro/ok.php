<?php
/** @var Promocao $promocao */
/** @var string $name */

use app\components\ConfigSite;
use app\models\Promocao;
use yii\helpers\Url;

$this->title = ConfigSite::getTitle();

$nome = Yii::$app->session->get('posto_slug');
$imagem = '/web/images/' . $nome . '/' . $promocao->imagem;
$host = Yii::$app->params['host'];
?>

<div class="col-sm-12" style="background: #fff; padding: 20px" id="historia">
    <div class="container">
        <div class="text-center">
            <h2 class="text-ok text-center">
                Parabéns <?= $name ?>!, <br>
            </h2>
            <h3>Você está participando da promoção: <?= $promocao->name ?></h3>
        </div>

        <div class="text-center" style="margin-top: 100px">
            <img src="<?= $host . '/' . $imagem ?>" class="images" alt="<?= ConfigSite::getTitle() ?>">
        </div>

        <div class="text-center" style="margin-top: 100px">
            <h4 class="text-center" style="color: var(--color-blue-1);"><?= $promocao->descricao ?></h4>
        </div>

        <div class="text-center" style="margin-top: 100px">
            <a href="<?= Url::to(['cadastro/index', 'slug' => $nome, 'promocao' => $promocao->slug]) ?>"
               class="text-center btn btn-primary" style="color: #fff; padding: 30px; font-size: 20px">
                PARTICIPAR DA PROMOÇÃO
            </a>
        </div>
    </div>
</div>


<style type="text/css">
    .text-ok {
        font-size: 45px;
        line-height: 64px;
        text-align: left;
        font-family: 'Fahkwang', sans-serif;
        color: var(--color-blue-1)
    }
</style>