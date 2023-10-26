<?php

use yii\db\Migration;

/**
 * Class m231026_115505_addColumns
 */
class m231026_115505_addColumns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('cliente', 'remote_id', $this->string(20));
        $this->addColumn('cliente', 'placa', $this->string(20));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('cliente', 'remote_id');
        $this->dropColumn('cliente', 'placa');

        echo "m231026_115505_addColumns cannot be reverted.\n";

        return true;
    }
}
