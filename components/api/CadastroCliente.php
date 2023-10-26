<?php

namespace app\components\api;

use app\models\Cliente;
use yii\helpers\ArrayHelper;
use yii\web\ForbiddenHttpException;
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
        $this->service = 'public/entidades/cadastro_simples';
        $this->method = 'POST';
    }


    public function execute()
    {
        $login = new Auth($this->model);
        $token = $login->execute();

        if (!$token) {
            throw new ForbiddenHttpException('Não foi possível gerar o token');
        }

        try {
            $request = $this->request([
                'nome' => $this->model->first_name . ' ' . $this->model->last_name,
                'cpfCnpj' => $this->model->cpf,
                'fone' => $this->model->phone,
                'email' => $this->model->email,
                'dataNascimento' => $this->model->birth_date,
                'placa' => ''
            ], [
                'Authorization' => 'Bearer ' . $token
            ]);

            $this->model->remote_id = $request['id'];
            $this->model->save();

            return true;

        } catch (\Exception $err) {
            return false;
        }
    }
}