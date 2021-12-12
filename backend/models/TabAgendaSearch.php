<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TabAgenda;

/**
 * TabAgendaSearch represents the model behind the search form about `backend\models\TabAgenda`.
 */
class TabAgendaSearch extends TabAgenda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tgl_agenda', 'waktu_agenda', 'uraian_agenda', 'tempat_agenda', 'pic_agenda', 'sedang_berlangsung'], 'safe'],
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
        $query = TabAgenda::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]]
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
            'tgl_agenda' => $this->tgl_agenda,
        ]);

        $query->andFilterWhere(['like', 'waktu_agenda', $this->waktu_agenda])
            ->andFilterWhere(['like', 'uraian_agenda', $this->uraian_agenda])
            ->andFilterWhere(['like', 'tempat_agenda', $this->tempat_agenda])
            ->andFilterWhere(['like', 'pic_agenda', $this->pic_agenda])
            ->andFilterWhere(['like', 'sedang_berlangsung', $this->sedang_berlangsung]);

        return $dataProvider;
    }
}
