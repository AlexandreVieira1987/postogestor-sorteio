<?php

namespace app\controllers;

use app\components\adm\Controller;

class AdmDashboardController extends Controller
{
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('/adm/dashboard/index');
    }
}
