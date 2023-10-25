<?php

namespace app\components;

use app\helpers\App;
use app\models\Config;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class ConfigSite
{
    public static function getEmail()
    {
        return ArrayHelper::getValue(Config::getConfig(), 'metadata.email_contact');
    }

    public static function getCnpj()
    {
        return ArrayHelper::getValue(Config::getConfig(), 'metadata.tax_id');
    }

    public static function getAddress()
    {
        return ArrayHelper::getValue(Config::getConfig(), 'metadata.address');
    }

    public static function getPhone1()
    {
        return App::mask('(##) #####-####', ArrayHelper::getValue(Config::getConfig(), 'phone_1'));
    }

    public static function getPhone2()
    {
        return ArrayHelper::getValue(Config::getConfig(), 'phone_2');
    }

    public static function getTitle()
    {
        return ArrayHelper::getValue(Config::getConfig(), 'title');
    }

    public static function getDescription()
    {
        return ArrayHelper::getValue(Config::getConfig(), 'description');
    }

    public static function getKeyWords()
    {
        return ArrayHelper::getValue(Config::getConfig(), 'key_words');
    }
}
