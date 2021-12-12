<?php

namespace backend\modules\pegawai\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\pegawai\models\DbPendidikan;

/**
 * DbPendidikanSearch represents the model behind the search form about `backend\modules\pegawai\models\DbPendidikan`.
 */
class DbPendidikanSearch extends DbPendidikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['kd_pendidikan', 'nm_pendidikan'], 'safe'],
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
        $query = DbPendidikan::find();

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

        $query->andFilterWhere(['like', 'kd_pendidikan', $this->kd_pendidikan])
            ->andFilterWhere(['like', 'nm_pendidikan', $this->nm_pendidikan]);

        return $dataProvider;
    }
}
