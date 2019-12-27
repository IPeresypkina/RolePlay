<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property int $id
 * @property int $psId FKPS
 * @property string $date Дата проведения
 * @property string $address Адрес
 * @property int $countPeople Количество человек
 * @property string $cost Цена
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата обновления
 *
 * @property Session $sessinos
 * @property Record[] $records
 */
class Date extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sessinosId', 'date', 'address', 'countPeople', 'cost'], 'required'],
            [['sessinosId', 'countPeople'], 'integer'],
            [['date', 'createdAt', 'updatedAt'], 'safe'],
            [['address', 'cost'], 'string', 'max' => 128],
            [['sessinosId'], 'exist', 'skipOnError' => true, 'targetClass' => Session::className(), 'targetAttribute' => ['psId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sessinosId' => 'FKS',
            'date' => 'Дата проведения',
            'address' => 'Адрес',
            'countPeople' => 'Количество человек',
            'cost' => 'Цена',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата обновления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessinos()
    {
        return $this->hasOne(Session::className(), ['id' => 'sessinosId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Record::className(), ['calendarId' => 'id']);
    }
}
