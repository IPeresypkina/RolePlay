<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $firstName Имя
 * @property string $secondName Фамилия
 * @property string $phone Телефон
 * @property string $email Почта
 * @property string|null $message Сообщение
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата изменения
 *
 * @property Record[] $records
 */
class User extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstName', 'secondName', 'phone', 'email'], 'required'],
            [['message'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['firstName', 'secondName', 'email'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'Имя',
            'secondName' => 'Фамилия',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'message' => 'Сообщение',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['usersId' => 'id']);
    }
}
