<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Venta;

/**
 * VentaSearch represents the model behind the search form of `app\models\Venta`.
 */
class VentaSearch extends Venta
{
    public function attributes()
    {
        // add related fields to searchable attributes
       return array_merge(parent::attributes(), ['clienteDescripcion','articuloDescripcion']);//para que no rompa en rules.
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['VentaId', 'ClienteId', 'ArticuloId', 'Cantidad', 'Total'], 'integer'],
            [['clienteDescripcion','articuloDescripcion'], 'string'],
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
        $query = Venta::find();
        $query->joinWith(['cliente', 'articulo']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['clienteDescripcion'] = [
            'asc' => ['cliente.Nombre' => SORT_ASC],
            'desc' => ['cliente.Nombre' => SORT_DESC],
        ];

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
            'VentaId' => $this->VentaId,
            // 'ClienteId' => $this->ClienteId,
            // 'ArticuloId' => $this->ArticuloId,
            'Cantidad' => $this->Cantidad,
            'Total' => $this->Total,
        ]);
        $query->andFilterWhere(['like', 'articulo.Descripcion', $this->getAttribute('articuloDescripcion')]);      
        $query->andFilterWhere(['like', 'cliente.Nombre', $this->getAttribute('clienteDescripcion')]);      
    
        return $dataProvider;
    }
}
