<?php

namespace backend\modules\setting\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\setting\models\P2Pejabat;

/**
 * P2PejabatSearch represents the model behind the search form of `backend\modules\p2\models\P2Pejabat`.
 */
class P2PejabatSearch extends P2Pejabat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nm_pejabat', 'nip_pejabat', 'jab_pejabat', 'kd_kantor'], 'safe'],
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
        $query = P2Pejabat::find();

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
        ]);

        $query->andFilterWhere(['like', 'nm_pejabat', $this->nm_pejabat])
            ->andFilterWhere(['like', 'nip_pejabat', $this->nip_pejabat])
            ->andFilterWhere(['like', 'jab_pejabat', $this->jab_pejabat])
            ->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor]);

        return $dataProvider;
    }
}
