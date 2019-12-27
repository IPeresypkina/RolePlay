<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plots".
 *
 * @property int $id
 * @property int $gamesId FKGames
 * @property string $title Название сюжета
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата обновления
 *
 * @property Game $games
 * @property Session[] $sessions
 */
class Plot extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plots';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gamesId', 'title'], 'required'],
            [['gamesId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['title'], 'string', 'max' => 128],
            [['gamesId'], 'exist', 'skipOnError' => true, 'targetClass' => Game::className(), 'targetAttribute' => ['gamesId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gamesId' => 'FKGames',
            'title' => 'Название сюжета',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата обновления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasOne(Game::className(), ['id' => 'gamesId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['plotsId' => 'id']);
    }
}
