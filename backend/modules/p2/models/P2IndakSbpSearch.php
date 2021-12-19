<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakSbp;

/**
 * P2IndakSbpSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakSbp`.
 */
class P2IndakSbpSearch extends P2IndakSbp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['surat_perintah_no', 'surat_perintah_tgl', 'nm_jenis_sarkut_sbp', 'voy_penerbangan_trayek_sarkut_sbp', 'uk_kap_muatan_sbp', 'nahkoda_pilot_sopir_sbp', 'bendera_sbp', 'no_register_nopol_sbp', 'jumlah_jenis_uk_nomor_sbp', 'petikemas_kemasan_sbp', 'jumlah_jenis_brg_sbp', 'jenis_no_tgl_dok_sbp', 'pemilik_imp_eks_kuasa_sbp', 'alamat_bgn_sbp', 'no_reg_nppbkc_dll_sbp', 'nm_pemilik_menguasai_sbp', 'nm_badan_sbp', 'tgl_lahir_badan_sbp', 'kewarganegaraan_badan_sbp', 'alamat_badan_sbp', 'no_identitas_badan_sbp', 'lokasi_indak_sbp', 'ur_indak_sbp', 'alasan_indak_sbp', 'jen_pelanggaran_sbp', 'tindakan_yang_diambil_id', 'waktu_indak_mulai_sbp', 'waktu_indak_selesai_sbp', 'hal_yang_terjadi_sbp', 'kd_kantor', 'petugas_id'], 'safe'],
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
        $query = P2IndakSbp::find();

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

        $query->andFilterWhere(['like', 'surat_perintah_no', $this->surat_perintah_no])
            ->andFilterWhere(['like', 'surat_perintah_tgl', $this->surat_perintah_tgl])
            ->andFilterWhere(['like', 'nm_jenis_sarkut_sbp', $this->nm_jenis_sarkut_sbp])
            ->andFilterWhere(['like', 'voy_penerbangan_trayek_sarkut_sbp', $this->voy_penerbangan_trayek_sarkut_sbp])
            ->andFilterWhere(['like', 'uk_kap_muatan_sbp', $this->uk_kap_muatan_sbp])
            ->andFilterWhere(['like', 'nahkoda_pilot_sopir_sbp', $this->nahkoda_pilot_sopir_sbp])
            ->andFilterWhere(['like', 'bendera_sbp', $this->bendera_sbp])
            ->andFilterWhere(['like', 'no_register_nopol_sbp', $this->no_register_nopol_sbp])
            ->andFilterWhere(['like', 'jumlah_jenis_uk_nomor_sbp', $this->jumlah_jenis_uk_nomor_sbp])
            ->andFilterWhere(['like', 'petikemas_kemasan_sbp', $this->petikemas_kemasan_sbp])
            ->andFilterWhere(['like', 'jumlah_jenis_brg_sbp', $this->jumlah_jenis_brg_sbp])
            ->andFilterWhere(['like', 'jenis_no_tgl_dok_sbp', $this->jenis_no_tgl_dok_sbp])
            ->andFilterWhere(['like', 'pemilik_imp_eks_kuasa_sbp', $this->pemilik_imp_eks_kuasa_sbp])
            ->andFilterWhere(['like', 'alamat_bgn_sbp', $this->alamat_bgn_sbp])
            ->andFilterWhere(['like', 'no_reg_nppbkc_dll_sbp', $this->no_reg_nppbkc_dll_sbp])
            ->andFilterWhere(['like', 'nm_pemilik_menguasai_sbp', $this->nm_pemilik_menguasai_sbp])
            ->andFilterWhere(['like', 'nm_badan_sbp', $this->nm_badan_sbp])
            ->andFilterWhere(['like', 'tgl_lahir_badan_sbp', $this->tgl_lahir_badan_sbp])
            ->andFilterWhere(['like', 'kewarganegaraan_badan_sbp', $this->kewarganegaraan_badan_sbp])
            ->andFilterWhere(['like', 'alamat_badan_sbp', $this->alamat_badan_sbp])
            ->andFilterWhere(['like', 'no_identitas_badan_sbp', $this->no_identitas_badan_sbp])
            ->andFilterWhere(['like', 'lokasi_indak_sbp', $this->lokasi_indak_sbp])
            ->andFilterWhere(['like', 'ur_indak_sbp', $this->ur_indak_sbp])
            ->andFilterWhere(['like', 'alasan_indak_sbp', $this->alasan_indak_sbp])
            ->andFilterWhere(['like', 'jen_pelanggaran_sbp', $this->jen_pelanggaran_sbp])
            ->andFilterWhere(['like', 'tindakan_yang_diambil_id', $this->tindakan_yang_diambil_id])
            ->andFilterWhere(['like', 'waktu_indak_mulai_sbp', $this->waktu_indak_mulai_sbp])
            ->andFilterWhere(['like', 'waktu_indak_selesai_sbp', $this->waktu_indak_selesai_sbp])
            ->andFilterWhere(['like', 'hal_yang_terjadi_sbp', $this->hal_yang_terjadi_sbp])
            ->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id]);

        return $dataProvider;
    }
}
