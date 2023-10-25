<?php

namespace app\controllers;

use app\models\Cliente;
use app\models\User;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex($slug, $promocao)
    {
        $promocao = Cliente::findCliente($promocao);

        return $this->render('index', [
            'promocao' => $promocao
        ]);
    }

    public function actionLogin()
    {
        $this->layout = 'main';

        $model = new User();

        if ($cookie = \Yii::$app->request->cookies->getValue('user')) {
            if ($cookie['id'] > 0) {
                return $this->redirect(['adm-dashboard/index']);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $model->checkUser();

            return $this->redirect(['adm-dashboard/index']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        \Yii::$app->response->cookies->remove('user');

        $session = Yii::$app->session;
        $session->destroy();

        return $this->redirect(['site/login']);
    }

    public function actionError()
    {
        return $this->render('error');
    }
}
