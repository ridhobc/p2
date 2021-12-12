<?php

namespace backend\modules\pos\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\pos\models\PosMaster;

/**
 * PosMasterSearch represents the model behind the search form about `backend\modules\pos\models\PosMaster`.
 */
class PosMasterSearch extends PosMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status_srt'], 'integer'],
            [['no_srt', 'tgl_srt', 'bidang_id', 'tujuan_id', 'nip_ptgs_kirim', 'nip_ptgs_rt'], 'safe'],
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
        $query = PosMaster::find();

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
            'tgl_srt' => $this->tgl_srt,
            'status_srt' => $this->status_srt,
        ]);

        $query->andFilterWhere(['like', 'no_srt', $this->no_srt])
            ->andFilterWhere(['like', 'bidang_id', $this->bidang_id])
            ->andFilterWhere(['like', 'tujuan_id', $this->tujuan_id])
            ->andFilterWhere(['like', 'nip_ptgs_kirim', $this->nip_ptgs_kirim])
            ->andFilterWhere(['like', 'nip_ptgs_rt', $this->nip_ptgs_rt]);

        return $dataProvider;
    }
}
