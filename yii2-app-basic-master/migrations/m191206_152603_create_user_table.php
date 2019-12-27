<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191206_152603_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(128)->notNull()->comment('Имя'),
            'secondName' => $this->string(128)->notNull()->comment('Фамилия'),
            'phone' => $this->string(64)->notNull()->comment('Телефон'),
            'email' => $this->string(128)->notNull()->comment('Почта'),
            'message' => $this->text()->comment('Сообщение'),
            'createdAt' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updatedAt' => $this->dateTime()->comment('Дата изменения')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
