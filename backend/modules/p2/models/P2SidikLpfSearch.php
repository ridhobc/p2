<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2SidikLpf;

/**
 * P2SidikLpfSearch represents the model behind the search form of `backend\modules\p2\models\P2SidikLpf`.
 */
class P2SidikLpfSearch extends P2SidikLpf
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_lpf', 'tgl_lpf', 'kesimpulan_lpf', 'usulan_lpf', 'catatan_disposisi_atasan', 'petugas_id', 'atasan_petugas_id', 'angsung_atasan_id'], 'safe'],
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
        $query = P2SidikLpf::find();

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
            'tgl_lpf' => $this->tgl_lpf,
            'sbp_id' => $this->sbp_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_lpf', $this->no_lpf])
            ->andFilterWhere(['like', 'kesimpulan_lpf', $this->kesimpulan_lpf])
            ->andFilterWhere(['like', 'usulan_lpf', $this->usulan_lpf])
            ->andFilterWhere(['like', 'catatan_disposisi_atasan', $this->catatan_disposisi_atasan])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id])
            ->andFilterWhere(['like', 'atasan_petugas_id', $this->atasan_petugas_id])
            ->andFilterWhere(['like', 'angsung_atasan_id', $this->angsung_atasan_id]);

        return $dataProvider;
    }
}
