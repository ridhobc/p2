<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakLp;

/**
 * P2IndakLpSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakLp`.
 */
class P2IndakLpSearch extends P2IndakLp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'lphp_id', 'sbp_id', 'no_lp', 'tgl_lp', 'petugas_id'], 'safe'],
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
        $query = P2IndakLp::find();

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
            'tgl_lp' => $this->tgl_lp,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'lphp_id', $this->lphp_id])
            ->andFilterWhere(['like', 'sbp_id', $this->sbp_id])
            ->andFilterWhere(['like', 'no_lp', $this->no_lp])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id]);

        return $dataProvider;
    }
}
