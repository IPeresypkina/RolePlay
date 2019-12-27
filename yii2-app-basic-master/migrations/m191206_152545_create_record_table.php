<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%record}}`.
 */
class m191206_152545_create_record_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%record}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%record}}');
    }
}
