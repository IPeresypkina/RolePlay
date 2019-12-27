<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%plotandsession}}`.
 */
class m191206_152529_create_plotandsession_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%plotandsession}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%plotandsession}}');
    }
}
