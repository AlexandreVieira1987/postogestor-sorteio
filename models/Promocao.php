<?php

namespace app\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "promocao".
 *
 * @property int $id
 * @property int|null $posto_id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $descricao
 * @property string|null $regulamento
 * @property string|null $imagem
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $metadata
 * @property Posto $posto
 */
class Promocao extends \yii\db\ActiveRecord
{
    const STATUS_ATIVA = 'ativa';
    const STATUS_INATIVA = 'inativa';
    const STATUS_AGENDADA = 'agendada';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promocao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['posto_id'], 'integer'],
            [['descricao', 'metadata', 'regulamento'], 'string'],
            [['date_start', 'date_end', 'created_at', 'updated_at'], 'safe'],
            [['name', 'slug'], 'string', 'max' => 150],
            [['imagem'], 'string', 'max' => 100],
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
            'name' => 'Name',
            'descricao' => 'Descricao',
            'imagem' => 'Imagem',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'metadata' => 'Metadata',
            'regulamento' => 'Regulamento',
        ];
    }

    public function getPosto()
    {
        return $this->hasOne(Posto::class, ['id' => 'posto_id']);
    }

    public function afterFind()
    {
        $this->metadata = Json::decode($this->metadata);

        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = date('Y-m-d h:i:s');
        }

        $this->updated_at = date('Y-m-d h:i:s');
        $this->metadata = Json::encode($this->metadata);

        return parent::beforeSave($insert);
    }
}
