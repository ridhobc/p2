<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakNpi;

/**
 * P2IndakNpiSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakNpi`.
 */
class P2IndakNpiSearch extends P2IndakNpi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ni_id', 'nhi_id', 'kategori_objek_id', 'petugas_id', 'pejabat_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_npi', 'tgl_npi', 'info_npi'], 'safe'],
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
        $query = P2IndakNpi::find();

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
            'tgl_npi' => $this->tgl_npi,
            'ni_id' => $this->ni_id,
            'nhi_id' => $this->nhi_id,
            'kategori_objek_id' => $this->kategori_objek_id,
            'petugas_id' => $this->petugas_id,
            'pejabat_id' => $this->pejabat_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_npi', $this->no_npi])
            ->andFilterWhere(['like', 'info_npi', $this->info_npi]);

        return $dataProvider;
    }
}
