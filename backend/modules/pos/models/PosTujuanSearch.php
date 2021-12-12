<?php

namespace backend\modules\pos\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\pos\models\PosTujuan;

/**
 * PosTujuanSearch represents the model behind the search form about `backend\modules\pos\models\PosTujuan`.
 */
class PosTujuanSearch extends PosTujuan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nm_tujuan', 'alamat_tujuan1', 'alamat_tujuan2', 'alamat_tujuan3', 'kota_tujuan'], 'safe'],
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
        $query = PosTujuan::find();

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

        $query->andFilterWhere(['like', 'nm_tujuan', $this->nm_tujuan])
            ->andFilterWhere(['like', 'alamat_tujuan1', $this->alamat_tujuan1])
            ->andFilterWhere(['like', 'alamat_tujuan2', $this->alamat_tujuan2])
            ->andFilterWhere(['like', 'alamat_tujuan3', $this->alamat_tujuan3])
            ->andFilterWhere(['like', 'kota_tujuan', $this->kota_tujuan]);

        return $dataProvider;
    }
}
