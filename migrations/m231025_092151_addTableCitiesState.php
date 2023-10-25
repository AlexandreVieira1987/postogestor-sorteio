<?php

use yii\db\Migration;
use yii\helpers\Json;

/**
 * Class m231025_092151_addTableCitiesState
 */
class m231025_092151_addTableCitiesState extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('state', [
            'id' => $this->primaryKey(),
            'remote_id' => $this->integer(),
            'code' => $this->string(2),
            'name' => $this->string(100),
        ]);

        $path = dirname(__DIR__).'/migrations/data/states.json';
        $content = file_get_contents($path);
        $states = Json::decode(utf8_encode($content));

        foreach ($states as $state){
            $this->insert('state',[
                'remote_id' => $state['ibge_id'],
                'code' => $state['initials'],
                'name' => $state['name']
            ]);
        }

        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'remote_id' => $this->integer(),
            'state_id' => $this->integer(),
            'name' => $this->string(150),
        ]);

        $path = dirname(__DIR__).'/migrations/data/cities.json';
        $content = file_get_contents($path);
        $states = Json::decode(utf8_encode($content));

        foreach ($states as $state){
            $this->insert('city',[
                'remote_id' => $state['ibge_id'],
                'state_id' => $state['state_id'],
                'name' => $state['name']
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('city');
        $this->dropTable('state');

        return true;
    }
}
