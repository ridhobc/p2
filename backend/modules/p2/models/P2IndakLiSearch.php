<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakLi;

/**
 * P2IndakLiSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakLi`.
 */
class P2IndakLiSearch extends P2IndakLi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_li', 'tgl_li', 'sumber_info', 'isi_info', 'tindak_lanjut_li', 'catatan_tindak_lanjut_li', 'petugas_id', 'pejabat_id'], 'safe'],
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
        $query = P2IndakLi::find();

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

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_li', $this->no_li])
            ->andFilterWhere(['like', 'tgl_li', $this->tgl_li])
            ->andFilterWhere(['like', 'sumber_info', $this->sumber_info])
            ->andFilterWhere(['like', 'isi_info', $this->isi_info])
            ->andFilterWhere(['like', 'tindak_lanjut_li', $this->tindak_lanjut_li])
            ->andFilterWhere(['like', 'catatan_tindak_lanjut_li', $this->catatan_tindak_lanjut_li])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id])
            ->andFilterWhere(['like', 'pejabat_id', $this->pejabat_id]);

        return $dataProvider;
    }
}
