<?php

use yii\db\Migration;

/**
 * Class m231023_000052_AddTableClientes
 */
class m231023_000052_AddTableClientes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cliente', [
            'id' => $this->primaryKey(),
            'posto_id' => $this->integer(),
            'first_name' => $this->string(100),
            'last_name' => $this->string(100),
            'cpf' => $this->string(11),
            'birth_date' => $this->date(),
            'phone' => $this->string(15),
            'email' => $this->string(150),
            'city' => $this->integer(),
            'street' => $this->string(150),
            'neighbourhood' => $this->string(150),
            'zip_code' => $this->string(15),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex('cliente_posto_idx', 'cliente', 'posto_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231023_000052_AddTableClientes cannot be reverted.\n";

        $this->dropIndex('cliente_posto_idx', 'cliente');
        $this->dropTable('cliente');

        return true;
    }
}
