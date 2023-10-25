<?php

namespace app\controllers;

use app\models\Cliente;
use yii\web\Controller;

class RegulamentoController extends Controller
{
    public function actionIndex($slug, $promocao)
    {
        return $this->render('regulamento', [
            'promocao' => Cliente::findCliente($promocao)
        ]);
    }
}
