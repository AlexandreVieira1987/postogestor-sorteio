<?php

use yii\helpers\Html;

$message = 'Página não encontrada';
if (Yii::$app->session->hasFlash('error')) {
    $message = Yii::$app->session->getFlash('error');
}
?>


<style type="text/css">
    .not-found-content{
        padding-top: 37px;
    }
    .not-found-title{
        font-weight: normal;
        font-size: 24px;
        line-height: 30px;
        color: #484848;
        margin-bottom: 16px;
        margin-top: 0;
    }
    .not-found-description{
        font-size: 16px;
        line-height: 1.5;
        color: #999999;
        margin-bottom: 40px;
    }
    .not-found-subtitle{
        font-size: 32px;
        line-height: 150%;
        color: #484848;
        margin-bottom: 8px;
        margin-top: 0;
    }
    .not-found-links{
        list-style: none;
        padding: 0;
    }
    .not-found-links li{
        margin-bottom: 4px;
    }
    .not-found-links a{
        font-size: 18px;
        line-height: 150%;
        color: #007bff;
    }
    .not-found-image{
        height: 348px;
        background-size: 607px;
        width: 399px;
        overflow: hidden;
        background-image: url(/images/not-found.gif); /* replace this */
        background-position: center;
        background-repeat: no-repeat;
        margin-left: auto;
        margin-right: auto;
        max-width: 100%;
    }
    .not-found-image:before{
        font-size: 67px;
        content: '404';
        display: block;
        text-align: center;
        color: #484848;
    }
    @media screen and (min-width: 992px){
        .not-found-content{
            padding-top: 168px;
            padding-bottom: 230px;
        }
        .not-found-title{
            font-size: 36px;
            line-height: 46px;
            letter-spacing: -0.4px;
        }
        .not-found-description{
            font-size: 18px;
        }
        .not-found-subtitle{
            font-size: 30px;
        }
        .not-found-image{
            margin-right: 0;
            position: relative;
            bottom: 9px;
            height: 357px;
            background-size: 710px;
        }
        .not-found-image:before{
            font-size: 74px;
            bottom: 15px;
            position: relative;
        }
    }
    @media screen and (min-width: 1200px){
        .not-found-content .container{
            max-width: 858px;
        }
    }
</style>

<div class="not-found-content" style="background-color: #fff;">
    <div class="container">
        <div class="row form-row">
            <div class="col-12 col-lg-12">
                <h1 class="not-found-subtitle"><?= nl2br(Html::encode($message)) ?></h1>
            </div>
        </div>
    </div>
</div>
