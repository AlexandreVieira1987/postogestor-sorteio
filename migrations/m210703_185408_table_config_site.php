<?php

use yii\db\Migration;

/**
 * Class m210703_185408_table_config_site
 */
class m210703_185408_table_config_site extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('posto', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
            'slug' => $this->string(150),
            'logo' => $this->string(100),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'metadata' => $this->text()
        ]);

        $this->createTable('promocao', [
            'id' => $this->primaryKey(),
            'posto_id' => $this->integer(),
            'name' => $this->string(150),
            'slug' => $this->string(150),
            'descricao' => $this->text(),
            'regulamento' => $this->text(),
            'imagem' => $this->string(100),
            'status' => $this->string(20)->defaultValue('agendada'),
            'date_start' => $this->date(),
            'date_end' => $this->date(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'metadata' => $this->text()
        ]);

        $this->createTable('config', [
            'id' => $this->primaryKey(),
            'posto_id' => $this->integer(),
            'receive_email' => $this->string(),
            'phone_1' => $this->string(),
            'phone_2' => $this->string(),
            'description' => $this->string(),
            'key_words' => $this->string(),
            'title' => $this->string(),
            'metadata' => $this->text(),
        ]);

        $this->insert('posto', [
            'name' => 'Posto Tecnuv',
            'slug' => 'tecnuv',
            'logo' => 'logo.png',
        ]);

        $this->insert('config', [
            'posto_id' => 1,
            'description' => 'Posto Tecnuv',
            'key_words' => 'tecnuv sistemas',
            'title' => 'Tecnuv Sistemas',
        ]);

        $this->createIndex('promocao_posto_idx', 'promocao', 'posto_id');
        $this->createIndex('config_posto_idx', 'config', 'posto_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('promocao_posto_idx', 'promocao');
        $this->dropIndex('config_posto_idx', 'config');

        $this->dropTable('config');
        $this->dropTable('posto');
        $this->dropTable('promocao');

        return true;
    }
}
