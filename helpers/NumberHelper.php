<?php


namespace app\helpers;


class NumberHelper
{
    public static function numbersOnly($value)
    {
        return preg_replace('/[^0-9]/', '', $value);
    }

    public static function ensureCurrency($value)
    {
        if (! preg_match('/[,.]+/', $value)) {
            return self::numbersOnly($value);
        }

        $decimals = (int) self::numbersOnly(substr($value, -2));
        $value = (int) self::numbersOnly(substr($value, 0, -2));

        return $value + ($decimals/100);
    }

    public static function formatMoneyBrToUs($value)
    {
        return str_replace(',', '.', str_replace('.', '', $value));
    }

    public static function formatMoneyUsToBr($value)
    {
        return number_format($value, 2, ',', '.');
    }

}