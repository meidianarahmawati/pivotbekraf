<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Unduhan;

/**
 * UnduhanSearch represents the model behind the search form of `frontend\models\Unduhan`.
 */
class UnduhanSearch extends Unduhan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'tabelid', 'flag'], 'integer'],
            [['datetime', 'ip', 'country'], 'safe'],
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
        $query = Unduhan::find();

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
            'userid' => $this->userid,
            'tabelid' => $this->tabelid,
            'datetime' => $this->datetime,
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'country', $this->country]);

        return $dataProvider;
    }
}
