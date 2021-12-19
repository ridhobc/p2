<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelNi;

/**
 * P2IntelNiSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelNi`.
 */
class P2IntelNiSearch extends P2IntelNi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sifat_ni', 'klasifikasi_ni', 'lkai_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_ni', 'tgl_ni', 'tujuan_kantor_ni', 'info_ni', 'pejabat_id', 'tembusan_ni'], 'safe'],
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
        $query = P2IntelNi::find();

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
            'tgl_ni' => $this->tgl_ni,
            'sifat_ni' => $this->sifat_ni,
            'klasifikasi_ni' => $this->klasifikasi_ni,
            'lkai_id' => $this->lkai_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_ni', $this->no_ni])
            ->andFilterWhere(['like', 'tujuan_kantor_ni', $this->tujuan_kantor_ni])
            ->andFilterWhere(['like', 'info_ni', $this->info_ni])
            ->andFilterWhere(['like', 'pejabat_id', $this->pejabat_id])
            ->andFilterWhere(['like', 'tembusan_ni', $this->tembusan_ni]);

        return $dataProvider;
    }
}
