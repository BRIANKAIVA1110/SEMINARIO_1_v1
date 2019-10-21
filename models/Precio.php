<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "precio".
 *
 * @property int $PrecioId
 * @property int $ArticuloId
 * @property string $Precio
 *
 * @property Articulo $articulo
 */
class Precio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'precio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArticuloId', 'Precio'], 'required'],
            [['ArticuloId'], 'integer'],
            [['Precio'], 'number'],
            [['ArticuloId'], 'exist', 'skipOnError' => true, 'targetClass' => Articulo::className(), 'targetAttribute' => ['ArticuloId' => 'ArticuloId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PrecioId' => 'Precio ID',
            'ArticuloId' => 'Articulo ID',
            'Precio' => 'Precio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulo()
    {
        return $this->hasOne(Articulo::className(), ['ArticuloId' => 'ArticuloId']);
    }
}
