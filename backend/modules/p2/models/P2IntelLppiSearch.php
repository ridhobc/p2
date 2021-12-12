<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelLppi;

/**
 * P2IntelLppiSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelLppi`.
 */
class P2IntelLppiSearch extends P2IntelLppi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kategori_lppi_id', 'sumber_info_id', 'penerima_info_id', 'penilai_info_id', 'disposisi_id', 'pejabat_id'], 'integer'],
            [['kd_kantor', 'tgl_lppi', 'media', 'tgl_terima', 'no_dok', 'tgl_dok', 'kesimpulan', 'tgl_disposisi', 'tindak_lanjut_id', 'catatan', 'status_pejabat',  'no_lppi'], 'safe'],
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
        $query = P2IntelLppi::find();

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
            'tgl_lppi' => $this->tgl_lppi,
            'kategori_lppi_id' => $this->kategori_lppi_id,
            'sumber_info_id' => $this->sumber_info_id,
            'tgl_terima' => $this->tgl_terima,
            'tgl_dok' => $this->tgl_dok,
            'penerima_info_id' => $this->penerima_info_id,
            'penilai_info_id' => $this->penilai_info_id,
            'disposisi_id' => $this->disposisi_id,
            'tgl_disposisi' => $this->tgl_disposisi,
            'pejabat_id' => $this->pejabat_id,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'media', $this->media])
            ->andFilterWhere(['like', 'no_dok', $this->no_dok])
            ->andFilterWhere(['like', 'kesimpulan', $this->kesimpulan])
            ->andFilterWhere(['like', 'tindak_lanjut_id', $this->tindak_lanjut_id])
            ->andFilterWhere(['like', 'catatan', $this->catatan])
            ->andFilterWhere(['like', 'status_pejabat', $this->status_pejabat])
            
            ->andFilterWhere(['like', 'no_lppi', $this->no_lppi]);

        return $dataProvider;
    }
}
