<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakMpp;

/**
 * P2IndakMppSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakMpp`.
 */
class P2IndakMppSearch extends P2IndakMpp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lapp_id', 'ni_id', 'nhi_id', 'li_id', 'kategori_objek_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['det_mpp_nama', 'det_mpp_umur', 'det_mpp_jenkel', 'det_mpp_alamat', 'det_mpp_perusahan_terkait', 'det_mpp_perusahan_alamat', 'jenis_pelanggaran', 'pasal_pelanggaran', 'locus_mpp', 'tempus_mpp', 'modus_mpp', 'komoditi_mpp', 'jumlah_brg_mpp', 'jenis_pengangkut_mpp', 'no_voy_pol_mpp', 'petikemas_kemasan_mpp', 'ukuran_petikemas_mpp', 'dokumen_terkait_mpp', 'instruksi_mpp', 'pejabat_id', 'kd_kantor'], 'safe'],
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
        $query = P2IndakMpp::find();

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
            'lapp_id' => $this->lapp_id,
            'ni_id' => $this->ni_id,
            'nhi_id' => $this->nhi_id,
            'li_id' => $this->li_id,
            'kategori_objek_id' => $this->kategori_objek_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'det_mpp_nama', $this->det_mpp_nama])
            ->andFilterWhere(['like', 'det_mpp_umur', $this->det_mpp_umur])
            ->andFilterWhere(['like', 'det_mpp_jenkel', $this->det_mpp_jenkel])
            ->andFilterWhere(['like', 'det_mpp_alamat', $this->det_mpp_alamat])
            ->andFilterWhere(['like', 'det_mpp_perusahan_terkait', $this->det_mpp_perusahan_terkait])
            ->andFilterWhere(['like', 'det_mpp_perusahan_alamat', $this->det_mpp_perusahan_alamat])
            ->andFilterWhere(['like', 'jenis_pelanggaran', $this->jenis_pelanggaran])
            ->andFilterWhere(['like', 'pasal_pelanggaran', $this->pasal_pelanggaran])
            ->andFilterWhere(['like', 'locus_mpp', $this->locus_mpp])
            ->andFilterWhere(['like', 'tempus_mpp', $this->tempus_mpp])
            ->andFilterWhere(['like', 'modus_mpp', $this->modus_mpp])
            ->andFilterWhere(['like', 'komoditi_mpp', $this->komoditi_mpp])
            ->andFilterWhere(['like', 'jumlah_brg_mpp', $this->jumlah_brg_mpp])
            ->andFilterWhere(['like', 'jenis_pengangkut_mpp', $this->jenis_pengangkut_mpp])
            ->andFilterWhere(['like', 'no_voy_pol_mpp', $this->no_voy_pol_mpp])
            ->andFilterWhere(['like', 'petikemas_kemasan_mpp', $this->petikemas_kemasan_mpp])
            ->andFilterWhere(['like', 'ukuran_petikemas_mpp', $this->ukuran_petikemas_mpp])
            ->andFilterWhere(['like', 'dokumen_terkait_mpp', $this->dokumen_terkait_mpp])
            ->andFilterWhere(['like', 'instruksi_mpp', $this->instruksi_mpp])
            ->andFilterWhere(['like', 'pejabat_id', $this->pejabat_id])
            ->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor]);

        return $dataProvider;
    }
}
