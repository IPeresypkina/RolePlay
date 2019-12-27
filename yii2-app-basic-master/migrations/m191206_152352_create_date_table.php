<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%date}}`.
 */
class m191206_152352_create_date_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%date}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%date}}');
    }
}
