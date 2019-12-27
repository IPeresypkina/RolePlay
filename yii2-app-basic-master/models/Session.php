<?php

namespace app\models;

use app\modules\api\controllers\BaseController;
use Yii;

/**
 * This is the model class for table "sessions".
 *
 * @property int $id
 * @property int $plotsId FKPlots
 * @property string $title Название сессии
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата обновления
 *
 * @property Plot $plots
 */
class Session extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plotsId', 'title'], 'required'],
            [['plotsId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['title'], 'string', 'max' => 64],
            [['plotsId'], 'exist', 'skipOnError' => true, 'targetClass' => Plot::className(), 'targetAttribute' => ['plotsId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plotsId' => 'FKPlots',
            'title' => 'Название сессии',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата обновления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlots()
    {
        return $this->hasOne(Plot::className(), ['id' => 'plotsId']);
    }
}
