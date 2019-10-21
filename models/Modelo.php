<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "modelo".
 *
 * @property int $ModeloId
 * @property string $Codigo
 * @property string $Descripcion
 *
 * @property Articulo[] $articulos
 */
class Modelo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modelo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Codigo'], 'required'],
            [['Codigo'], 'string', 'max' => 5],
            [['Descripcion'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ModeloId' => 'Modelo ID',
            'Codigo' => 'Codigo',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['ModeloId' => 'ModeloId']);
    }
}
