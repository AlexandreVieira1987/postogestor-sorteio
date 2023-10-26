<?php
/** @var Promocao $promocao */

use app\components\ConfigSite;
use app\models\Promocao;
use yii\helpers\Url;

$nome = Yii::$app->session->get('posto_slug');
$imagem = '/web/images/' . $nome . '/' . $promocao->imagem;
$host = Yii::$app->params['host'];
?>
<div class="col-sm-12" style="background: #fff; color: #a94442; padding: 20px" id="historia">
    <div class="container">
        <div class="col-sm-8">
            <div class="text-center" style="margin-top: 100px">
                <h2 class="title-section text-center" style="color: var(--color-blue-1);"><?= $promocao->name ?></h2>

                <h4 class="text-center" style="color: var(--color-blue-1);"><?= $promocao->regulamento ?></h4>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="text-center" style="margin-top: 100px">
                <img class="images" src="<?= $host . '/' . $imagem ?>" alt="<?= ConfigSite::getTitle() ?>">
            </div>
        </div>


        <div class="col-sm-12" style="margin-top: 100px">
            <div class="text-center">
                <a href="<?= Url::to(['cadastro/index', 'slug' => $nome, 'promocao' => $promocao->slug]) ?>" class="text-center btn btn-primary" style="color: #fff; padding: 30px; font-size: 20px">
                    PARTICIPAR DA PROMOÇÃO
                </a>
            </div>
        </div>
    </div>
</div>
