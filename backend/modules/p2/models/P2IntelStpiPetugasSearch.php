<?php

namespace backend\modules\p2\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\p2\models\P2IntelStpiPetugas;

/**
 * P2IntelStpiPetugasSearch represents the model behind the search form of `backend\modules\p2\models\P2IntelStpiPetugas`.
 */
class P2IntelStpiPetugasSearch extends P2IntelStpiPetugas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_intel_stpi'], 'integer'],
            [['nip_pegawai', 'status_pegawai', 'kd_kantor'], 'safe'],
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
        $query = P2IntelStpiPetugas::find();

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
            'id_intel_stpi' => $this->id_intel_stpi,
        ]);

        $query->andFilterWhere(['like', 'nip_pegawai', $this->nip_pegawai])
            ->andFilterWhere(['like', 'status_pegawai', $this->status_pegawai])
            ->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor]);

        return $dataProvider;
    }
}
