<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Guarderia;

/**
 * GuarderiaSearch represents the model behind the search form of `app\models\Guarderia`.
 */
class GuarderiaSearch extends Guarderia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gua_id', 'usuario_id'], 'integer'],
            [['gua_inicial', 'gua_final', 'guarderia', 'observacion'], 'safe'],
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
        $query = Guarderia::find();

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
            'gua_id' => $this->gua_id,
            'gua_inicial' => $this->gua_inicial,
            'gua_final' => $this->gua_final,
            'guarderia' => $this->guarderia,
            'usuario_id' => $this->usuario_id,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
