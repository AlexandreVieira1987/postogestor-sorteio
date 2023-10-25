<?php

namespace app\models;

use app\helpers\App;
use app\helpers\NumberHelper;
use kekaadrenalin\recaptcha3\ReCaptchaValidator;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yiibr\brvalidator\CpfValidator;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property int|null $posto_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $cpf
 * @property string|null $birth_date
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $city
 * @property string|null $street
 * @property string|null $neighbourhood
 * @property string|null $zip_code
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property string|null $birthDateFormatted
 * @property string|null $zipCodeFormatted
 * @property string|null $phoneFormatted
 * @property string|null $cpfFormatted
 *
 *
 * @property Posto $posto
 */
class Cliente extends \yii\db\ActiveRecord
{
    public $verifyCode;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    public function getPosto()
    {
        return $this->hasOne(Posto::class, ['posto_id' => 'id']);
    }


    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = date('Y-m-d h:i:s');
        }

        $this->updated_at = date('Y-m-d h:i:s');
        return parent::beforeSave($insert);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posto_id', 'city'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['birthDateFormatted', 'zipCodeFormatted', 'phoneFormatted', 'cpfFormatted'], 'safe'],
            [['birth_date'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['cpf'], 'string', 'max' => 11],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'email'],
            [['street', 'neighbourhood'], 'string', 'max' => 150],
            [['zip_code'], 'string', 'max' => 15],
            [['first_name', 'last_name', 'cpfFormatted', 'email', 'phone', 'zipCodeFormatted', 'phoneFormatted',
                'street', 'neighbourhood', 'city', 'birthDateFormatted'], 'required'],
            [['cpfFormatted'], CpfValidator::class]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'posto_id' => 'Posto ID',
            'first_name' => 'Primeiro Nome',
            'last_name' => 'Último Nome',
            'cpfFormatted' => 'Cpf',
            'birthDateFormatted' => 'Data de Nascimento',
            'phoneFormatted' => 'Fone',
            'email' => 'E-mail',
            'city' => 'Cidade',
            'street' => 'Rua/Avenida',
            'neighbourhood' => 'Bairro',
            'zipCodeFormatted' => 'CEP',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCpfFormatted()
    {
        if (!$this->cpf) {
            return null;
        }

        return App::mask('###.###.###-##', $this->cpf);
    }

    public function setCpfFormatted($value)
    {
        $this->cpf = NumberHelper::numbersOnly($value);
    }

    public function getPhoneFormatted()
    {
        if (!$this->phone) {
            return null;
        }

        return App::mask('(##) #####-####', $this->phone);
    }

    public function setPhoneFormatted($value)
    {
        $this->phone = NumberHelper::numbersOnly($value);
    }

    public function getZipCodeFormatted()
    {
        if ($this->zip_code) {
            return App::mask('#####-###', $this->zip_code);
        }
    }

    public function setZipCodeFormatted($value)
    {
        $this->zip_code = NumberHelper::numbersOnly($value);
    }

    public function getBirthDateFormatted()
    {
        if (!$this->birth_date) {
            return null;
        }
        return Yii::$app->formatter->asDate($this->birth_date, 'php:d/m/Y');
    }

    public function setBirthDateFormatted($value)
    {
        $this->birth_date = App::toDbDate($value);
    }

    public static function findCliente($slug)
    {
        if ($model = Promocao::findOne(['slug' => $slug])) {
            foreach ($model->posto->attributes as $key => $attribute) {
                Yii::$app->session->set('posto_' . $key, $attribute);
            }

            foreach ($model->attributes as $key => $attribute) {
                Yii::$app->session->set('promocao_' . $key, $attribute);
            }

            return $model;
        }

        return new NotFoundHttpException('Promoção não localizada');
    }
}
