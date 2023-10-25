<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property int|null $remote_id
 * @property int|null $state_id
 * @property string|null $name
 *
 * @property State $state
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['remote_id', 'state_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
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
            'state_id' => 'State ID',
            'name' => 'Name',
        ];
    }

    public function getState()
    {
        return $this->hasOne(State::class, ['remote_id' => 'state_id']);
    }

    public static function findCityByNmae($city, $state)
    {
        return self::find()
            ->leftJoin('state', 'state.remote_id = city.state_id')
            ->where(['like', 'state.code', strtoupper($state)])
            ->andWhere(['like', 'city.name', $city])
            ->one();
    }

    public static function items()
    {
        $rows = self::find()
                    ->join('inner join', 'state', 'city.state_id = state.remote_id')
                    ->select(['city.id', "CONCAT(city.name, ' - ' , state.code) AS name"])
                    ->all();

        return ArrayHelper::map($rows, 'id', 'name');
    }
}
