<?php

namespace app\components\api;

use app\models\Cliente;
use yii\web\NotFoundHttpException;

class CadastroCliente extends ClientApiTecnuv
{

    /** @var Cliente $model */
    public $model;

    /**
     * @throws NotFoundHttpException
     */
    public function __construct($model)
    {
        if (! ($model instanceof Cliente)) {
            throw new NotFoundHttpException('Cliente não encontrado');
        }

        $this->model = $model;
        $this->service = 'customer';
        $this->method = 'POST';
    }


    public function execute()
    {
        foreach ($this->model as $item) {
            var_dump($item->contact->phone);
        }

        exit;
    }
}