<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Precio;

/**
 * PrecioSearch represents the model behind the search form of `app\models\Precio`.
 */
class PrecioSearch extends Precio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PrecioId', 'ArticuloId'], 'integer'],
            [['Precio'], 'number'],
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
        $query = Precio::find();

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
            'PrecioId' => $this->PrecioId,
            'ArticuloId' => $this->ArticuloId,
            'Precio' => $this->Precio,
        ]);

        return $dataProvider;
    }
}
