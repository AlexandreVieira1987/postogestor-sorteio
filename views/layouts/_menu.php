<?php

use app\components\Nav;
use yii\helpers\Url;
use yii\widgets\Menu;

?>

<header id="header-container">
    <div class="navbar" id="navbar-header-component">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?=Url::to(['site/index'])?>" class="logo flex">
                    <img style="height: 50px" src="<?= Yii::getAlias('@images') . '/logo.png' ?>" alt="logo">
                </a>
            </div>

            <nav id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?= Menu::widget([
                        'options' => ['class' => 'nav navbar-nav', 'id' => 'navbar'],
                        'items' => Nav::itemsAdmin(),
                        'submenuTemplate' => "\n<ul class='subnav'>\n{items}\n</ul>\n",
                    ]); ?>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <?= Menu::widget([
                        'options' => ['class' => 'nav navbar-nav', 'id' => 'navbar'],
                        'items' => Nav::itemsRightAdmin(),
                        'submenuTemplate' => "\n<ul class='subnav'>\n{items}\n</ul>\n",
                    ]) ?>
                </ul>
            </nav>
        </div>
    </div>
</header>

