<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelLkai;

/**
 * P2IntelLkaiSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelLkai`.
 */
class P2IntelLkaiSearch extends P2IntelLkai {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['no_lkai', 'tgl_lkai', 'dok_sumber_lppi', 'no_lppi_id', 'dok_sumber_lpti', 'no_lpti_id', 'dok_sumber_npi', 'no_npi', 'tgl_npi', 'ikhtisar_informasi_lkai', 'prosedur_analisis_lkai', 'hasil_analisis_lkai', 'kesimpulan_lkai', 'rekomendasi_lkai_id', 'rekomendasi_lainnya_ur', 'informasi_lainnya_id', 'informasi_lainnya_ur', 'tujuan_lkai', 'analis_lkai_nip', 'keputusan_angsung_id', 'keputusan_angsung_cat', 'keputusan_angsung_tgl_terima', 'keputusan_angsung_nip', 'keputusan_atasan_angsung_id', 'keputusan_atasan_angsung_cat', 'keputusan_atasan_angsung_tgl_terima', 'keputusan_atasan_angsung_nip'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = P2IntelLkai::find();

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
            'tgl_lkai' => $this->tgl_lkai,
            'tgl_npi' => $this->tgl_npi,
            'keputusan_angsung_tgl_terima' => $this->keputusan_angsung_tgl_terima,
            'keputusan_atasan_angsung_tgl_terima' => $this->keputusan_atasan_angsung_tgl_terima,
        ]);

        $query->andFilterWhere(['like', 'no_lkai', $this->no_lkai])
                ->andFilterWhere(['like', 'dok_sumber_lppi', $this->dok_sumber_lppi])
                ->andFilterWhere(['like', 'no_lppi_id', $this->no_lppi_id])
                ->andFilterWhere(['like', 'dok_sumber_lpti', $this->dok_sumber_lpti])
                ->andFilterWhere(['like', 'no_lpti_id', $this->no_lpti_id])
                ->andFilterWhere(['like', 'dok_sumber_npi', $this->dok_sumber_npi])
                ->andFilterWhere(['like', 'no_npi', $this->no_npi])
                ->andFilterWhere(['like', 'ikhtisar_informasi_lkai', $this->ikhtisar_informasi_lkai])
                ->andFilterWhere(['like', 'prosedur_analisis_lkai', $this->prosedur_analisis_lkai])
                ->andFilterWhere(['like', 'hasil_analisis_lkai', $this->hasil_analisis_lkai])
                ->andFilterWhere(['like', 'kesimpulan_lkai', $this->kesimpulan_lkai])
                ->andFilterWhere(['like', 'rekomendasi_lkai_id', $this->rekomendasi_lkai_id])
                ->andFilterWhere(['like', 'rekomendasi_lainnya_ur', $this->rekomendasi_lainnya_ur])
                ->andFilterWhere(['like', 'informasi_lainnya_id', $this->informasi_lainnya_id])
                ->andFilterWhere(['like', 'informasi_lainnya_ur', $this->informasi_lainnya_ur])
                ->andFilterWhere(['like', 'tujuan_lkai', $this->tujuan_lkai])
                ->andFilterWhere(['like', 'analis_lkai_nip', $this->analis_lkai_nip])
                ->andFilterWhere(['like', 'keputusan_angsung_id', $this->keputusan_angsung_id])
                ->andFilterWhere(['like', 'keputusan_angsung_cat', $this->keputusan_angsung_cat])
                ->andFilterWhere(['like', 'keputusan_angsung_nip', $this->keputusan_angsung_nip])
                ->andFilterWhere(['like', 'keputusan_atasan_angsung_id', $this->keputusan_atasan_angsung_id])
                ->andFilterWhere(['like', 'keputusan_atasan_angsung_cat', $this->keputusan_atasan_angsung_cat])
                ->andFilterWhere(['like', 'keputusan_atasan_angsung_nip', $this->keputusan_atasan_angsung_nip]);

        return $dataProvider;
    }

}
