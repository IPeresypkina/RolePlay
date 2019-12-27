<?php

namespace app\modules\admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Game;

/**
 * SearchGame represents the model behind the search form of `app\models\Game`.
 */
class SearchGame extends Game
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['title', 'image', 'history', 'nations', 'worldview', 'groupings', 'anomalies', 'mutants', 'createdAt', 'updatedAt'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Game::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Id' => $this->Id,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'history', $this->history])
            ->andFilterWhere(['like', 'nations', $this->nations])
            ->andFilterWhere(['like', 'worldview', $this->worldview])
            ->andFilterWhere(['like', 'groupings', $this->groupings])
            ->andFilterWhere(['like', 'anomalies', $this->anomalies])
            ->andFilterWhere(['like', 'mutants', $this->mutants]);

        return $dataProvider;
    }
}
