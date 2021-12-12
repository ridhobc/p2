<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelStpi;

/**
 * P2IntelStpiSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelStpi`.
 */
class P2IntelStpiSearch extends P2IntelStpi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['kd_kantor', 'tgl_rekam', 'uraian_tugas', 'kategori_tugas', 'periode_penugasan', 'wilayah_penugasan', 'pejabat_id', 'status_plh'], 'safe'],
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
        $query = P2IntelStpi::find();

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
            'tgl_rekam' => $this->tgl_rekam,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'uraian_tugas', $this->uraian_tugas])
            ->andFilterWhere(['like', 'kategori_tugas', $this->kategori_tugas])
            ->andFilterWhere(['like', 'periode_penugasan', $this->periode_penugasan])
            ->andFilterWhere(['like', 'wilayah_penugasan', $this->wilayah_penugasan])
            ->andFilterWhere(['like', 'pejabat_id', $this->pejabat_id])
            ->andFilterWhere(['like', 'status_plh', $this->status_plh]);

        return $dataProvider;
    }
}
