<?php

namespace backend\modules\pegawai\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\pegawai\models\DbPegawaiOjt;

/**
 * DbPegawaiOjtSearch represents the model behind the search form about `backend\modules\pegawai\models\DbPegawaiOjt`.
 */
class DbPegawaiOjtSearch extends DbPegawaiOjt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nim_stan', 'nama_ojt', 'nip_ojt'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = DbPegawaiOjt::find();

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
        ]);

        $query->andFilterWhere(['like', 'nim_stan', $this->nim_stan])
            ->andFilterWhere(['like', 'nama_ojt', $this->nama_ojt])
            ->andFilterWhere(['like', 'nip_ojt', $this->nip_ojt]);

        return $dataProvider;
    }
}
