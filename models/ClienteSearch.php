<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    public function attributes()
    {
        // add related fields to searchable attributes
       return array_merge(parent::attributes(), ['fechaNacimiento']);//para que no rompa en rules.
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ClienteId'], 'integer'],
            [['Nombre', 'Apellido', 'email', 'Domicilio'], 'safe'],
            ['fechaNacimiento','string'],
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
        $query = Cliente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['fechaNacimiento'] = [
            'asc' => ['FechaNacimiento' => SORT_ASC],
            'desc' => ['FechaNacimiento' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ClienteId' => $this->ClienteId,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'Domicilio', $this->Domicilio])
            ->andFilterWhere(['like', 'FechaNacimiento', $this->getAttribute('fechaNacimiento')]);
            

        return $dataProvider;
    }
}
