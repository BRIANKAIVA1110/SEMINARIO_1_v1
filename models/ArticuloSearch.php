<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Articulo;

/**
 * ArticuloSearch represents the model behind the search form of `app\models\Articulo`.
 */
class ArticuloSearch extends Articulo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArticuloId', 'ModeloId', 'ColorId'], 'integer'],
            [['Descripcion', 'CodigoBarras'], 'safe'],
            [['modelo', 'color'], 'string'],
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
        $query = Articulo::find();
        $query->joinWith(['modelo', 'color']);

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
            'ArticuloId' => $this->ArticuloId,
            'ModeloId' => $this->ModeloId,
            'ColorId' => $this->ColorId,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'CodigoBarras', $this->CodigoBarras]);

        return $dataProvider;
    }
}
