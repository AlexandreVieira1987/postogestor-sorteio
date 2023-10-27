<?php

use app\components\ConfigSite;

$host = Yii::$app->params['host'] . '/web/images';

$instagram = ConfigSite::instagram();
$facebook = ConfigSite::facebook();
$phone = ConfigSite::getPhone1();
$site = ConfigSite::site();
$email = ConfigSite::getEmail();


?>
<footer class="footer col-sm-12 p0" id="contato" style="margin-bottom: 20px;">
    <div style="height: 250px" class="col-sm-12 p0 text-center">
        <?php if ($facebook || $instagram): ?>
            <div class="col-sm-6">
                <div class="containser" style="margin-top: 20px">
                    <h2 style="color: #fff">
                        Acesse Nossas Redes Sociais
                    </h2>
                    <div class="col-sm-12 text-center">
                        <?php if ($instagram): ?>
                            <a title="ir para nosso instagram" data-toggle="tooltip" href="<?= $instagram ?>" target="_blank">
                                <img src="<?= $host ?>/instagram.png" style="height: 70px; padding: 10px" alt="<?= ConfigSite::getTitle() ?>">
                            </a>
                        <?php endif; ?>

                        <?php if ($facebook): ?>
                            <a title="ir para nosso facebook" data-toggle="tooltip" href="<?= $facebook ?>" target="_blank">
                                <img src="<?= $host ?>/facebook.png" style="height: 70px; padding: 10px" alt="<?= ConfigSite::getTitle() ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($phone || $site || $email): ?>
            <div class="col-sm-6">
                <div class="s" style="margin-top: 20px">
                    <h2 style="color: #fff">
                        Entre em Contato
                    </h2>
                    <div class="col-sm-12 text-center">
                        <?php if ($phone): ?>
                            <a title="falar conoso" data-toggle="tooltip" href="tel:<?= $phone ?>" target="_blank">
                                <img src="<?= $host ?>/phone.png" style="height: 70px; padding: 10px" alt="<?= ConfigSite::getTitle() ?>">
                            </a>
                        <?php endif; ?>

                        <?php if ($email): ?>
                            <a href=mailto:"<?= $email ?>" title="entre em contato por e-mail" data-toggle="tooltip" target="_blank">
                                <img src="<?= $host ?>/email.png" style="height: 70px; padding: 10px" alt="<?= ConfigSite::getTitle() ?>">
                            </a>
                        <?php endif; ?>

                        <?php if ($site): ?>
                            <a href="<?= $site ?>" title="acesse nosso site" data-toggle="tooltip" target="_blank">
                                <img src="<?= $host ?>/site.png" style="height: 70px; padding: 10px" alt="<?= ConfigSite::getTitle() ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</footer>