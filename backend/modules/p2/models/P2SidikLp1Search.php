<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2SidikLp1;

/**
 * P2SidikLp1Search represents the model behind the search form of `backend\modules\p2\models\P2SidikLp1`.
 */
class P2SidikLp1Search extends P2SidikLp1
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kategori_objek_id', 'lpp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_lp1', 'tgl_lp1', 'surat_pelimpahan_perkara_no', 'surat_pelimpahan_perkara_tgl', 'instansi_pelimpah', 'jenis_perkara', 'locus_lp1', 'tempus_lp1', 'jam_lp1', 'nama_pelaku_lp1', 'umur_pelaku_lp1', 'jenkel_pelaku_lp1', 'alamat_pelaku_lp1', 'kel_komoditi_brg_lp1', 'jml_koli_brg_lp1', 'jenis_koli_brg_lp1', 'jenis_sarkut_lp1', 'voy_nopol_sarkut_lp1', 'nocont_sarkut_lp1', 'ukcont_sarkut_lp1', 'jen_pelanggaran_lp1', 'pasal_pelanggaran_lp1', 'modus_pelanggaran_lp1', 'petugas_id'], 'safe'],
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
        $query = P2SidikLp1::find();

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
            'tgl_lp1' => $this->tgl_lp1,
            'surat_pelimpahan_perkara_tgl' => $this->surat_pelimpahan_perkara_tgl,
            'kategori_objek_id' => $this->kategori_objek_id,
            'lpp_id' => $this->lpp_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_lp1', $this->no_lp1])
            ->andFilterWhere(['like', 'surat_pelimpahan_perkara_no', $this->surat_pelimpahan_perkara_no])
            ->andFilterWhere(['like', 'instansi_pelimpah', $this->instansi_pelimpah])
            ->andFilterWhere(['like', 'jenis_perkara', $this->jenis_perkara])
            ->andFilterWhere(['like', 'locus_lp1', $this->locus_lp1])
            ->andFilterWhere(['like', 'tempus_lp1', $this->tempus_lp1])
            ->andFilterWhere(['like', 'jam_lp1', $this->jam_lp1])
            ->andFilterWhere(['like', 'nama_pelaku_lp1', $this->nama_pelaku_lp1])
            ->andFilterWhere(['like', 'umur_pelaku_lp1', $this->umur_pelaku_lp1])
            ->andFilterWhere(['like', 'jenkel_pelaku_lp1', $this->jenkel_pelaku_lp1])
            ->andFilterWhere(['like', 'alamat_pelaku_lp1', $this->alamat_pelaku_lp1])
            ->andFilterWhere(['like', 'kel_komoditi_brg_lp1', $this->kel_komoditi_brg_lp1])
            ->andFilterWhere(['like', 'jml_koli_brg_lp1', $this->jml_koli_brg_lp1])
            ->andFilterWhere(['like', 'jenis_koli_brg_lp1', $this->jenis_koli_brg_lp1])
            ->andFilterWhere(['like', 'jenis_sarkut_lp1', $this->jenis_sarkut_lp1])
            ->andFilterWhere(['like', 'voy_nopol_sarkut_lp1', $this->voy_nopol_sarkut_lp1])
            ->andFilterWhere(['like', 'nocont_sarkut_lp1', $this->nocont_sarkut_lp1])
            ->andFilterWhere(['like', 'ukcont_sarkut_lp1', $this->ukcont_sarkut_lp1])
            ->andFilterWhere(['like', 'jen_pelanggaran_lp1', $this->jen_pelanggaran_lp1])
            ->andFilterWhere(['like', 'pasal_pelanggaran_lp1', $this->pasal_pelanggaran_lp1])
            ->andFilterWhere(['like', 'modus_pelanggaran_lp1', $this->modus_pelanggaran_lp1])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id]);

        return $dataProvider;
    }
}
