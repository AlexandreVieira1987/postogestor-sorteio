<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use yii\web\Cookie;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $username
 * @property string|null $password
 * @property int|null $is_active 1 = Sim | 0 = Não
 * @property int|null $type 1 = Admin | 2 = Cliente | 3 = Super Admin
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    const TYPE_ADMIN = 1;
    const TYPE_CUSTOMER = 2;
    const TYPE_SUPER = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active', 'type', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 64],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
            'is_active' => 'Is Active',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return array|false|User
     */
    public function checkUser()
    {
        $user = self::find()->where(['username' => $this->username])
            ->andWhere(['password' => md5($this->password)])
            ->andWhere(['is_active' => self::STATUS_ACTIVE])
            ->andWhere(['type' => [
                self::TYPE_ADMIN,
                self::TYPE_SUPER
            ]])
            ->one();

        if ($user) {
            return $user;
        }
        return false;
    }

    public function login()
    {
        $user = $this->checkUser();

        if ($user) {
            $session = \Yii::$app->session;

            self::registerCookie($user->attributes, 'user');

            $session->open();
            $session->set('logged', true);
            $session->set('username', $user->username);
            $session->set('name', $user->name);
            $session->set('type', $user->type);

            return true;
        }

        return false;
    }

    public static function registerCookie($data, $name)
    {
        $user = \Yii::$app->request->cookies->getValue($name);
        if (isset($user)) {
            \Yii::$app->response->cookies->remove($name);
        }

        $cookie  = \Yii::$app->response->cookies;
        $cookie->add(new Cookie([
            'name' => $name,
            'value' => $data,
            'expire' => time() + (60 * 60 * 24 * 30) // 30 days
        ]));

        return \Yii::$app->request->cookies->getValue($name);
    }

    public static function getNameUserCurrent()
    {
        if (\Yii::$app->request->isConsoleRequest) {
            return 'Sistema';
        }

        $cookie = \Yii::$app->request->cookies->get('user');
        if (!$cookie) {
            return 'Sistema';
        }

        return ArrayHelper::getValue($cookie->value, 'name', 'Sistema');
    }
}
