<?php

namespace app\commands;

use app\components\api\CadastroCliente;
use app\models\Cliente;
use yii\console\Controller;

class ClienteController extends Controller
{
    public function actionExecute()
    {
        $rows = Cliente::find()->where(['remote_id' => null])->all();

        foreach ($rows as $row) {
            $client = new CadastroCliente($row);
            $client->execute();
        }
    }
}
