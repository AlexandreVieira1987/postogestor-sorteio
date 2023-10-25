<?php

namespace app\helpers;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class App
{
    const DB_DATE_FORMAT = 'php:Y-m-d';
    const BR_DATE_FORMAT = 'php:d/m/Y';
    const DB_DATETIME_FORMAT = 'php:Y-m-d H:i:s';
    const DB_TIME_FORMAT = 'php:H:i:s';

    public static function toDbDateTime($value)
    {
        $locale = strtolower(substr(Yii::$app->formatter->locale, 0, 2));
        if ($locale == 'pt') {
            $value = \DateTime::createFromFormat('d/m/Y', $value);
        }
        return Yii::$app->formatter->asDatetime($value, self::DB_DATETIME_FORMAT);
    }

    public static function toDbDate($value)
    {
        $locale = strtolower(substr(Yii::$app->formatter->locale, 0, 2));
        if ($locale == 'pt') {
            $value = \DateTime::createFromFormat('d/m/Y', $value);
        }

        return Yii::$app->formatter->asDate($value, self::DB_DATE_FORMAT);
    }

    public static function toBrDate($value)
    {
        return Yii::$app->formatter->asDate($value, self::BR_DATE_FORMAT);
    }

    public static function toDbTime($value)
    {
        return Yii::$app->formatter->asTime($value, self::DB_TIME_FORMAT);
    }

    public static function mask($mask, $str)
    {
        $str = str_replace(' ', '', $str);

        for($i = 0; $i < strlen($str); $i++) {
            $nextIndex = strpos($mask, "#");
            if (! is_numeric($nextIndex)) {
                break;
            }
            $mask[$nextIndex] = $str[$i];
        }

        return $mask;
    }

    public static function allCached($table, $query = false)
    {
        return (new Query())->from($table)->indexBy(['slug'])->all();
    }

    public static function getRowBySlug($slug, $table)
    {
        return ArrayHelper::getValue(self::allCached($table), $slug, []);
    }

    public static function formattedPhone($number)
    {
        if (strlen(NumberHelper::numbersOnly($number)) == 11) {
            return self::mask('(##) #####-####', $number);
        }

        if (strlen(NumberHelper::numbersOnly($number)) == 10) {
            return self::mask('(##) ####-####', $number);
        }
    }
}
