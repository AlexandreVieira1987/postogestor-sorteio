<?php

namespace app\models;

/**
 * This is the model class for table "state".
 *
 * @property int $id
 * @property int|null $remote_id
 * @property string|null $code
 * @property string|null $name
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['remote_id'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'remote_id' => 'Remote ID',
            'code' => 'Code',
            'name' => 'Name',
        ];
    }
}
