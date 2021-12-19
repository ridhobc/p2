<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelNp;

/**
 * P2IntelNpSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelNp`.
 */
class P2IntelNpSearch extends P2IntelNp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sifat_np', 'klasifikasi_np', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_np', 'tgl_np', 'tujuan_kantor_np', 'info_np', 'pejabat_id'], 'safe'],
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
        $query = P2IntelNp::find();

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
            'tgl_np' => $this->tgl_np,
            'sifat_np' => $this->sifat_np,
            'klasifikasi_np' => $this->klasifikasi_np,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_np', $this->no_np])
            ->andFilterWhere(['like', 'tujuan_kantor_np', $this->tujuan_kantor_np])
            ->andFilterWhere(['like', 'info_np', $this->info_np])
            ->andFilterWhere(['like', 'pejabat_id', $this->pejabat_id]);

        return $dataProvider;
    }
}
