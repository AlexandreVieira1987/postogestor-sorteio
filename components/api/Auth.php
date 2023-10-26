<?php

namespace app\components\api;

use app\models\Cliente;
use yii\web\NotFoundHttpException;

class Auth extends ClientApiTecnuv
{

    /** @var Cliente $model */
    private $model;

    public function __construct($model)
    {
        if (! ($model instanceof Cliente)) {
            throw new NotFoundHttpException('Cliente não encontrado');
        }

        $this->model = $model;
        $this->service = 'auth/login';
        $this->method = 'POST';
    }


    public function execute()
    {
        $server = $this->model->posto->metadata['api']['server'];
        $user = $this->model->posto->metadata['api']['user'];
        $pass = $this->model->posto->metadata['api']['pass'];
        $clientId = $this->model->posto->metadata['api']['clientId'];

        $login = $this->request([
            'usuario' => $user,
            'senha' => $pass,
            'servidor' => $server,
            'clientId' => $clientId
        ]);

        return $login['token'];
    }
}