<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stock;

/**
 * StockSearch represents the model behind the search form of `app\models\Stock`.
 */
class StockSearch extends Stock
{
    public function attributes()
    {
        // add related fields to searchable attributes
       return array_merge(parent::attributes(), ['articuloDescripcion']);//para que no rompa en rules.
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['StockId', 'ArticuloId', 'Cantidad'], 'integer'],
            [['articuloDescripcion'], 'string'],
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
        $query = Stock::find();
        $query->joinWith(['articulo']);
        // add conditions that should always apply here
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['articuloDescripcion'] = [
            'asc' => ['articulo.Descripcion' => SORT_ASC],
            'desc' => ['articulo.Descripcion' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'StockId' => $this->StockId,
            // 'ArticuloId' => $this->ArticuloId,
            'Cantidad' => $this->Cantidad,
        ]);
        $query->andFilterWhere(['like', 'articulo.Descripcion', $this->getAttribute('articuloDescripcion')]);      

        return $dataProvider;
    }
}
