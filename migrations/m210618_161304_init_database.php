<?php

use yii\db\Migration;

/**
 * Class m210618_161304_init_database
 */
class m210618_161304_init_database extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
            'username' => $this->string()->unique(),
            'password' => $this->string(64),
            'is_active' => $this->smallInteger()->comment('1 = Sim | 0 = Não'),
            'type' => $this->smallInteger()->comment('1 = Tecnuv | 2 = Posto'),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->insert('user', [
            'name' => 'Alexandre Vieira',
            'username' => 'sites.alexandre@gmail.com',
            'password' => md5('1234'),
            'is_active' => 1,
            'type' => 3,
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');

        return true;
    }
}
