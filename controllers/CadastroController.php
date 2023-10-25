<?php

namespace app\controllers;

use app\helpers\NumberHelper;
use app\models\City;
use app\models\Cliente;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;

class CadastroController extends Controller
{

    public function actionIndex($slug, $promocao)
    {
        $model = new Cliente();

        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $model = $this->findModel($post['Cliente']['cpfFormatted']);

            if (!$model) {
                $model = new Cliente();
            }

            $model->posto_id = (int) Yii::$app->session->get('posto_id');

            $model->load($post);
            $model->save();
        }

        return $this->render('index', [
            'promocao' => Cliente::findCliente($promocao),
            'model' => $model
        ]);
    }

    private function findModel($cpf)
    {
        if ($model = Cliente::findOne([
            'cpf' => NumberHelper::numbersOnly($cpf),
            'posto_id' => (int) Yii::$app->session->get('posto_id')
        ])) {
            return $model;
        }

        return false;
    }

    public function actionPostalCode()
    {
        if (!isset($_GET['code'])) {
            throw new \Exception('Missing required parameter Postal Address');
        }

        $code = trim(preg_replace('/[^0-9]/', '', $_GET['code']));

        $result = [
            'success' => false
        ];

        try {
            $data = Json::decode(file_get_contents("http://cep.republicavirtual.com.br/web_cep.php?cep=$code&formato=json"));

            if (in_array((int) $data['resultado'], [1, 2])) {
                $result = [
                    'success' => true,
                    'street' => trim($data['logradouro']),
                    'neighbourhood' => trim($data['bairro']),
                ];

                $city = City::findCityByNmae($data['cidade'], $data['uf']);
                if ($city !== null) {
                    $result['city'] = $city->id;
                }
            }
        } catch (\Exception $ex) {
        }

        return $this->asJson($result);
    }
}
