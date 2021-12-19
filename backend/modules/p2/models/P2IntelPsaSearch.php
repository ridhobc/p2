<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelPsa;

/**
 * P2IntelPsaSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelPsa`.
 */
class P2IntelPsaSearch extends P2IntelPsa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'atas_pelanggaran_psa', 'oleh_pelanggaran_psa', 'kronologi_psa', 'modus_psa', 'indikator_resiko_psa', 'pihak_terkait_psa', 'analisa_peraturan_psa', 'signifikansi_penindakan_psa', 'proses_penanganan_psa', 'kesimpulan_rekomendasi_psa', 'petugas_id'], 'safe'],
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
        $query = P2IntelPsa::find();

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
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'atas_pelanggaran_psa', $this->atas_pelanggaran_psa])
            ->andFilterWhere(['like', 'oleh_pelanggaran_psa', $this->oleh_pelanggaran_psa])
            ->andFilterWhere(['like', 'kronologi_psa', $this->kronologi_psa])
            ->andFilterWhere(['like', 'modus_psa', $this->modus_psa])
            ->andFilterWhere(['like', 'indikator_resiko_psa', $this->indikator_resiko_psa])
            ->andFilterWhere(['like', 'pihak_terkait_psa', $this->pihak_terkait_psa])
            ->andFilterWhere(['like', 'analisa_peraturan_psa', $this->analisa_peraturan_psa])
            ->andFilterWhere(['like', 'signifikansi_penindakan_psa', $this->signifikansi_penindakan_psa])
            ->andFilterWhere(['like', 'proses_penanganan_psa', $this->proses_penanganan_psa])
            ->andFilterWhere(['like', 'kesimpulan_rekomendasi_psa', $this->kesimpulan_rekomendasi_psa])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id]);

        return $dataProvider;
    }
}
