<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $title Название
 * @property string $image Картинки
 * @property string $history История
 * @property string|null $nations Национальности
 * @property string|null $worldview Мировоззрения 
 * @property string|null $groupings Группировки
 * @property string|null $anomalies Аномалии
 * @property string|null $mutants Мутанты
 * @property string $createdAt Дата создания
 * @property string|null $updatedAt Дата обновления
 *
 * @property Plot[] $plots
 */
class Game extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'image', 'history'], 'required'],
            [['history', 'nations', 'worldview', 'groupings', 'anomalies', 'mutants'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['title', 'image'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'image' => 'Картинки',
            'history' => 'История',
            'nations' => 'Национальности',
            'worldview' => 'Мировоззрения ',
            'groupings' => 'Группировки',
            'anomalies' => 'Аномалии',
            'mutants' => 'Мутанты',
            'createdAt' => 'Дата создания',
            'updatedAt' => 'Дата обновления',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlots()
    {
        return $this->hasMany(Plot::className(), ['gamesId' => 'id']);
    }
}
