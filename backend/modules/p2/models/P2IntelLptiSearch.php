<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelLpti;

/**
 * P2IntelLptiSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelLpti`.
 */
class P2IntelLptiSearch extends P2IntelLpti
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stpi_id'], 'integer'],
            [['lpti_simpulan', 'lpti_rekom'], 'safe'],
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
        $query = P2IntelLpti::find();

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
            'id' => $this->id,
            'stpi_id' => $this->stpi_id,
        ]);

        $query->andFilterWhere(['like', 'lpti_simpulan', $this->lpti_simpulan])
            ->andFilterWhere(['like', 'lpti_rekom', $this->lpti_rekom]);

        return $dataProvider;
    }
}
