<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2SidikLpp;

/**
 * P2SidikLppSearch represents the model behind the search form of `backend\modules\p2\models\P2SidikLpp`.
 */
class P2SidikLppSearch extends P2SidikLpp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_lpp', 'tgl_lpp', 'no_lp_surat', 'tgl_lp_surat', 'catatan_atas_pembuat_lpp', 'petugas_id', 'atasan_petugas_id', 'angsung_atasan_petugas_id'], 'safe'],
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
        $query = P2SidikLpp::find();

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
            'tgl_lpp' => $this->tgl_lpp,
            'tgl_lp_surat' => $this->tgl_lp_surat,
            'sbp_id' => $this->sbp_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_lpp', $this->no_lpp])
            ->andFilterWhere(['like', 'no_lp_surat', $this->no_lp_surat])
            ->andFilterWhere(['like', 'catatan_atas_pembuat_lpp', $this->catatan_atas_pembuat_lpp])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id])
            ->andFilterWhere(['like', 'atasan_petugas_id', $this->atasan_petugas_id])
            ->andFilterWhere(['like', 'angsung_atasan_petugas_id', $this->angsung_atasan_petugas_id]);

        return $dataProvider;
    }
}
