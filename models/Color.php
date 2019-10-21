<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "color".
 *
 * @property int $ColorId
 * @property string $Codigo
 * @property string $Descripcion
 *
 * @property Articulo[] $articulos
 */
class Color extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Codigo', 'Descripcion'], 'required'],
            [['Codigo'], 'string', 'max' => 5],
            [['Descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ColorId' => 'Color ID',
            'Codigo' => 'Codigo',
            'Descripcion' => 'Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['ColorId' => 'ColorId']);
    }
}
