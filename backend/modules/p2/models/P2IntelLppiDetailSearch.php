<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelLppiDetail;

/**
 * P2IntelLppiDetailSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelLppiDetail`.
 */
class P2IntelLppiDetailSearch extends P2IntelLppiDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['lppi_id', 'ikhtisar_info', 'cek_sumber_id', 'cek_validitas_id'], 'safe'],
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
        $query = P2IntelLppiDetail::find();

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

        $query->andFilterWhere(['like', 'lppi_id', $this->lppi_id])
            ->andFilterWhere(['like', 'ikhtisar_info', $this->ikhtisar_info])
            ->andFilterWhere(['like', 'cek_sumber_id', $this->cek_sumber_id])
            ->andFilterWhere(['like', 'cek_validitas_id', $this->cek_validitas_id]);

        return $dataProvider;
    }
}
