<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\MTabel;

/**
 * MtabelSearch represents the model behind the search form of `frontend\models\MTabel`.
 */
class MtabelSearch extends MTabel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'keterangan', 'pilihkolom', 'lokasi', 'konfigjson', 'value', 'kolommaster', 'setcol', 'setrow'], 'safe'],
            [['kategori'], 'integer'],
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
        $query = MTabel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'kategori' => $this->kategori,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'pilihkolom', $this->pilihkolom])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'konfigjson', $this->konfigjson])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'kolommaster', $this->kolommaster])
            ->andFilterWhere(['like', 'setcol', $this->setcol])
            ->andFilterWhere(['like', 'setrow', $this->setrow]);

        return $dataProvider;
    }
}
