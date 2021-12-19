<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakLptp;

/**
 * P2IndakLptpSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakLptp`.
 */
class P2IndakLptpSearch extends P2IndakLptp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kategori_objek_id', 'sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_sprint', 'tgl_sprint', 'ur_penindakan', 'alasan_tidak_indak', 'catatan_lptp', 'petugas_id', 'atasan_petugas_id'], 'safe'],
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
        $query = P2IndakLptp::find();

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
            'tgl_sprint' => $this->tgl_sprint,
            'kategori_objek_id' => $this->kategori_objek_id,
            'sbp_id' => $this->sbp_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_sprint', $this->no_sprint])
            ->andFilterWhere(['like', 'ur_penindakan', $this->ur_penindakan])
            ->andFilterWhere(['like', 'alasan_tidak_indak', $this->alasan_tidak_indak])
            ->andFilterWhere(['like', 'catatan_lptp', $this->catatan_lptp])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id])
            ->andFilterWhere(['like', 'atasan_petugas_id', $this->atasan_petugas_id]);

        return $dataProvider;
    }
}
