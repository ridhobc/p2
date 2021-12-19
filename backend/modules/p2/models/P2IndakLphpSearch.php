<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IndakLphp;

/**
 * P2IndakLphpSearch represents the model behind the search form of `backend\modules\p2\models\P2IndakLphp`.
 */
class P2IndakLphpSearch extends P2IndakLphp
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'lptp_id', 'sbp_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['kd_kantor', 'no_lphp', 'tgl_lphp', 'analisa_hasil_indak_lphp', 'catatan_lphp', 'petugas_id', 'atasan_petugas_id'], 'safe'],
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
        $query = P2IndakLphp::find();

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
            'tgl_lphp' => $this->tgl_lphp,
            'lptp_id' => $this->lptp_id,
            'sbp_id' => $this->sbp_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'no_lphp', $this->no_lphp])
            ->andFilterWhere(['like', 'analisa_hasil_indak_lphp', $this->analisa_hasil_indak_lphp])
            ->andFilterWhere(['like', 'catatan_lphp', $this->catatan_lphp])
            ->andFilterWhere(['like', 'petugas_id', $this->petugas_id])
            ->andFilterWhere(['like', 'atasan_petugas_id', $this->atasan_petugas_id]);

        return $dataProvider;
    }
}
