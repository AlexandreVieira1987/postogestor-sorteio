<?php

namespace app\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "posto".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $logo
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $metadata
 */
class Posto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['metadata'], 'string'],
            [['name', 'slug'], 'string', 'max' => 150],
            [['logo'], 'string', 'max' => 100],
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
            'slug' => 'Slug',
            'logo' => 'Logo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'metadata' => 'Metadata',
        ];
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
