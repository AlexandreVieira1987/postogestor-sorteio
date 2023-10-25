<?php

namespace app\components\adm;


use yii\bootstrap\Modal;
use yii\filters\AccessControl;

class Controller extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                    ]
                ],
            ],
        ];
    }

    public function init()
    {
        parent::init();

        if (!$this->isLogged()) {
            return $this->redirect('/login');
        }
    }

    public function isLogged()
    {
        $cookie = \Yii::$app->request->cookies->get('user');

        if ($cookie) {
            return true;
        }

        return false;
    }
}
