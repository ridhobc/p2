<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelNhi;

/**
 * P2IntelNhiSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelNhi`.
 */
class P2IntelNhiSearch extends P2IntelNhi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_nhi', 'tgl_nhi', 'sifat_nhi_id', 'klasifikasi_nhi_id', 'lkai_id', 'kd_kantor_tujuan_nhi_id', 'tempat_info', 'tgl_info', 'kantor_bc_info_id', 'kepabenanan_info_chek', 'nm_no_dok_kepabeanan', 'nm_sarkut_kepab', 'voy_nopol_sarkut_kepab', 'no_bl_awb', 'no_kontainer_merk_koli', 'nm_imp_eks_ppjk', 'npwp', 'jenis_jumlah_brg_kepab', 'data_lainnya_kepab', 'cukai_info_cek', 'nm_eks_pab_tpe', 'nm_penyalur', 'nm_tpe', 'no_nppbkc', 'nm_sarkut_cukai', 'voy_nopol_sarkut_cukai', 'jenis_jumlah_brg_cukai', 'data_lainnya_cukai', 'barang_tertentu_cek', 'nm_no_dok_brg_tertentu', 'nm_sarkut_brg_tertentu', 'voy_nopol_brg_tertentu', 'no_bl_awb_brg_tertentu', 'no_kontainer_merk_koli_brg_tertentu', 'org_badan_hukum', 'jenis_jumlah_brg_brg_tertentu', 'data_lainnya_cukai_brg_tertentu', 'indikasi_info', 'pejabat_id', 'tembusan_kantor'], 'safe'],
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
        $query = P2IntelNhi::find();

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
            'tgl_nhi' => $this->tgl_nhi,
            'tgl_info' => $this->tgl_info,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_nhi', $this->no_nhi])
            ->andFilterWhere(['like', 'sifat_nhi_id', $this->sifat_nhi_id])
            ->andFilterWhere(['like', 'klasifikasi_nhi_id', $this->klasifikasi_nhi_id])
            ->andFilterWhere(['like', 'lkai_id', $this->lkai_id])
            ->andFilterWhere(['like', 'kd_kantor_tujuan_nhi_id', $this->kd_kantor_tujuan_nhi_id])
            ->andFilterWhere(['like', 'tempat_info', $this->tempat_info])
            ->andFilterWhere(['like', 'kantor_bc_info_id', $this->kantor_bc_info_id])
            ->andFilterWhere(['like', 'kepabenanan_info_chek', $this->kepabenanan_info_chek])
            ->andFilterWhere(['like', 'nm_no_dok_kepabeanan', $this->nm_no_dok_kepabeanan])
            ->andFilterWhere(['like', 'nm_sarkut_kepab', $this->nm_sarkut_kepab])
            ->andFilterWhere(['like', 'voy_nopol_sarkut_kepab', $this->voy_nopol_sarkut_kepab])
            ->andFilterWhere(['like', 'no_bl_awb', $this->no_bl_awb])
            ->andFilterWhere(['like', 'no_kontainer_merk_koli', $this->no_kontainer_merk_koli])
            ->andFilterWhere(['like', 'nm_imp_eks_ppjk', $this->nm_imp_eks_ppjk])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'jenis_jumlah_brg_kepab', $this->jenis_jumlah_brg_kepab])
            ->andFilterWhere(['like', 'data_lainnya_kepab', $this->data_lainnya_kepab])
            ->andFilterWhere(['like', 'cukai_info_cek', $this->cukai_info_cek])
            ->andFilterWhere(['like', 'nm_eks_pab_tpe', $this->nm_eks_pab_tpe])
            ->andFilterWhere(['like', 'nm_penyalur', $this->nm_penyalur])
            ->andFilterWhere(['like', 'nm_tpe', $this->nm_tpe])
            ->andFilterWhere(['like', 'no_nppbkc', $this->no_nppbkc])
            ->andFilterWhere(['like', 'nm_sarkut_cukai', $this->nm_sarkut_cukai])
            ->andFilterWhere(['like', 'voy_nopol_sarkut_cukai', $this->voy_nopol_sarkut_cukai])
            ->andFilterWhere(['like', 'jenis_jumlah_brg_cukai', $this->jenis_jumlah_brg_cukai])
            ->andFilterWhere(['like', 'data_lainnya_cukai', $this->data_lainnya_cukai])
            ->andFilterWhere(['like', 'barang_tertentu_cek', $this->barang_tertentu_cek])
            ->andFilterWhere(['like', 'nm_no_dok_brg_tertentu', $this->nm_no_dok_brg_tertentu])
            ->andFilterWhere(['like', 'nm_sarkut_brg_tertentu', $this->nm_sarkut_brg_tertentu])
            ->andFilterWhere(['like', 'voy_nopol_brg_tertentu', $this->voy_nopol_brg_tertentu])
            ->andFilterWhere(['like', 'no_bl_awb_brg_tertentu', $this->no_bl_awb_brg_tertentu])
            ->andFilterWhere(['like', 'no_kontainer_merk_koli_brg_tertentu', $this->no_kontainer_merk_koli_brg_tertentu])
            ->andFilterWhere(['like', 'org_badan_hukum', $this->org_badan_hukum])
            ->andFilterWhere(['like', 'jenis_jumlah_brg_brg_tertentu', $this->jenis_jumlah_brg_brg_tertentu])
            ->andFilterWhere(['like', 'data_lainnya_cukai_brg_tertentu', $this->data_lainnya_cukai_brg_tertentu])
            ->andFilterWhere(['like', 'indikasi_info', $this->indikasi_info])
            ->andFilterWhere(['like', 'pejabat_id', $this->pejabat_id])
            ->andFilterWhere(['like', 'tembusan_kantor', $this->tembusan_kantor]);

        return $dataProvider;
    }
}
