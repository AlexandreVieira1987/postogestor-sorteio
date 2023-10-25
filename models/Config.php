<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;
use yii\helpers\Json;

/**
 * This is the model class for table "config".
 *
 * @property int $id
 * @property string|null $receive_email
 * @property int|null $posto_id
 * @property string|null $phone_1
 * @property string|null $phone_2
 * @property string|null $description
 * @property string|null $key_words
 * @property string|null $title
 * @property string|null $metadata
 * @property Posto $posto
 */
class Config extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posto_id'], 'integer'],
            [['metadata'], 'safe'],
            [['receive_email', 'phone_1', 'phone_2', 'key_words', 'title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 140],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receive_email' => 'Email de recebimento',
            'phone_1' => 'Fone 1',
            'phone_2' => 'Fone 2',
            'description' => 'Descrição do site',
            'key_words' => 'Palavras chave',
            'title' => 'Título do site',
            'metadata' => 'Metadata',
        ];
    }

    public function getPosto()
    {
        return $this->hasOne(Posto::class, ['posto_id' => 'id']);
    }

    public function afterFind()
    {
        $this->metadata = Json::decode($this->metadata);

        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        $this->metadata = Json::encode($this->metadata);

        return parent::beforeSave($insert);
    }

    public static function getConfig()
    {
        static $cache = null;
        if ($cache !== null) {
            return $cache;
        }

        $model = (new Query())->from(['config'])->limit(1)->one();

        $items = [];
        foreach ($model as $key => $item) {
            if ($key == 'metadata') {
                $item = Json::decode($item);
            }
            $items[$key] = $item;
        }

        return $cache = $items;
    }
}
