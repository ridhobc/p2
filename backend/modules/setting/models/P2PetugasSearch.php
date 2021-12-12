<?php

namespace backend\modules\setting\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\setting\models\P2Petugas;

/**
 * P2PetugasSearch represents the model behind the search form of `backend\modules\setting\models\P2Petugas`.
 */
class P2PetugasSearch extends P2Petugas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_aktif', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['nip_petugas', 'nm_petugas', 'kd_kantor', 'pangkat_petugas', 'gol_petugas', 'jabatan_petugas'], 'safe'],
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
        $query = P2Petugas::find();

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
            'status_aktif' => $this->status_aktif,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'nip_petugas', $this->nip_petugas])
            ->andFilterWhere(['like', 'nm_petugas', $this->nm_petugas])
            ->andFilterWhere(['like', 'kd_kantor', $this->kd_kantor])
            ->andFilterWhere(['like', 'pangkat_petugas', $this->pangkat_petugas])
            ->andFilterWhere(['like', 'gol_petugas', $this->gol_petugas])
            ->andFilterWhere(['like', 'jabatan_petugas', $this->jabatan_petugas]);

        return $dataProvider;
    }
}
