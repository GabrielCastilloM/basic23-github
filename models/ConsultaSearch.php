<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consulta;

/**
 * ConsultaSearch represents the model behind the search form of `app\models\Consulta`.
 */
class ConsultaSearch extends Consulta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['con_id'], 'integer'],
            [['laboratorio', 'lab_archivo', 'rayosx', 'ray_archivo'], 'safe'],
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
        $query = Consulta::find();

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
            'con_id' => $this->con_id,
        ]);

        $query->andFilterWhere(['like', 'laboratorio', $this->laboratorio])
            ->andFilterWhere(['like', 'lab_archivo', $this->lab_archivo])
            ->andFilterWhere(['like', 'rayosx', $this->rayosx])
            ->andFilterWhere(['like', 'ray_archivo', $this->ray_archivo]);

        return $dataProvider;
    }
}
