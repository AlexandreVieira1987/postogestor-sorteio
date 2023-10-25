<?php

namespace app\components;

class Nav
{
    public static function itemsAdmin()
    {
        $menuItemsFile = dirname(__DIR__) . '/components/adm/menu.php';

        if (file_exists($menuItemsFile)) {
            $nav = require($menuItemsFile);
        } else {
            $nav = [];
        }
        return $nav;
    }

    public static function itemsRightAdmin()
    {
        $menuItemsFile = dirname(__DIR__) . '/components/adm/menuRight.php';

        if (file_exists($menuItemsFile)) {
            $nav = require($menuItemsFile);
        } else {
            $nav = [];
        }
        return $nav;
    }
}
