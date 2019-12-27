<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "records".
 *
 * @property int $id
 * @property int $usersId FKUsers
 * @property int $calendarId FKCalendar
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата обновления
 *
 * @property User $users
 * @property Date $calendar
 */
class Record extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'records';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usersId', 'calendarId'], 'required'],
            [['usersId', 'calendarId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['usersId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usersId' => 'id']],
            [['calendarId'], 'exist', 'skipOnError' => true, 'targetClass' => Date::className(), 'targetAttribute' => ['calendarId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usersId' => 'FKUsers',
            'calendarId' => 'FKCalendar',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата обновления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'usersId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendar()
    {
        return $this->hasOne(Date::className(), ['id' => 'calendarId']);
    }
}
