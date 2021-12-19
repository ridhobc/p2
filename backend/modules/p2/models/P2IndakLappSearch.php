<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakLapp;

/**
 * P2IndakLappSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakLapp`.
 */
class P2IndakLappSearch extends P2IndakLapp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'li_id', 'ni_id', 'nhi_id', 'pelaku_cek', 'pelanggaran_cek', 'locus_cek', 'tempus_cek', 'prosedural_cek', 'sdm_cek', 'sarpras_cek', 'anggaran_cek', 'layak_operasi_cek', 'mandiri_cek', 'dgn_bantuan_cek', 'pelimpahan_cek', 'pelimpahan_bantuan_cek', 'perbantuan_insta_lain_cek', 'tidak_layak_operasi_cek', 'layak_patroli_cek', 'tidak_layak_patroli_cek', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_lapp', 'tgl_lapp', 'pelaku_keterangan', 'pelanggaran_keterangan', 'locus_keterangan', 'tempus_keterangan', 'prosedural_keterangan', 'sdm_keterangan', 'sarpras_keterangan', 'anggaran_keterangan', 'mandiri_keterangan', 'dgn_bantuan_keterangan', 'pelimpahan_keterangan', 'pelimpahan_bantuan_keterangan', 'perbantuan_insta_lain_keterangan', 'layak_patroli_keterangan', 'tidak_layak_patroli_keterangan', 'kesimpulan_lapp', 'petugas_id', 'pejabat_id'], 'safe'],
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
        $query = P2IndakLapp::find();

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
            'tgl_lapp' => $this->tgl_lapp,
            'li_id' => $this->li_id,
            'ni_id' => $this->ni_id,
            'nhi_id' => $this->nhi_id,
            'pelaku_cek' => $this->pelaku_cek,
            'pelanggaran_cek' => $this->pelanggaran_cek,
            'locus_cek' => $this->locus_cek,
            'tempus_cek' => $this->tempus_cek,
            'prosedural_cek' => $this->prosedural_cek,
            'sdm_cek' => $this->sdm_cek,
            'sarpras_cek' => $this->sarpras_cek,
            'anggaran_cek' => $this->anggaran_cek,
            'layak_operasi_cek' => $this->layak_operasi_cek,
            'mandiri_cek' => $this->mandiri_cek,
            'dgn_bantuan_cek' => $this->dgn_bantuan_cek,
            'pelimpahan_cek' => $this->pelimpahan_cek,
            'pelimpahan_bantuan_cek' => $this->pelimpahan_bantuan_cek,
            'perbantuan_insta_lain_cek' => $this->perbantuan_insta_lain_cek,
            'tidak_layak_operasi_cek' => $this->tidak_layak_operasi_cek,
            'layak_patroli_cek' => $this->layak_patroli_cek,
            'tidak_layak_patroli_cek' => $this->tidak_layak_patroli_cek,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_lapp', $this->no_lapp])
            ->andFilterWhere(['like', 'pelaku_keterangan', $this->pelaku_keterangan])
            ->andFilterWhere(['like', 'pelanggaran_keterangan', $this->pelanggaran_keterangan])
            ->andFilterWhere(['like', 'locus_keterangan', $this->locus_keterangan])
            ->andFilterWhere(['like', 'tempus_keterangan', $this->tempus_keterangan])
            ->andFilterWhere(['like', 'prosedural_keterangan', $this->prosedural_keterangan])
            ->andFilterWhere(['like', 'sdm_keterangan', $this->sdm_keterangan])
            ->andFilterWhere(['like', 'sarpras_keterangan', $this->sarpras_keterangan])
            ->andFilterWhere(['like', 'anggaran_keterangan', $this->anggaran_keterangan])
            ->andFilterWhere(['like', 'mandiri_keterangan', $this->mandiri_keterangan])
            ->andFilterWhere(['like', 'dgn_bantuan_keterangan', $this->dgn_bantuan_keterangan])
            ->andFilterWhere(['like', 'pelimpahan_keterangan', $this->pelimpahan_keterangan])
            ->andFilterWhere(['like', 'pelimpahan_bantuan_keterangan', $this->pelimpahan_bantuan_keterangan])
            ->andFilterWhere(['like', 'perbantuan_insta_lain_keterangan', $this->perbantuan_insta_lain_keterangan])
            ->andFilterWhere(['like', 'layak_patroli_keterangan', $this->layak_patroli_keterangan])
            ->andFilterWhere(['like', 'tidak_layak_patroli_keterangan', $this->tidak_layak_patroli_keterangan])
            ->andFilterWhere(['like', 'kesimpulan_lapp', $this->kesimpulan_lapp])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id])
            ->andFilterWhere(['like', 'pejabat_id', $this->pejabat_id]);

        return $dataProvider;
    }
}
