<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $StockId
 * @property int $ArticuloId
 * @property int $Cantidad
 *
 * @property Articulo $articulo
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArticuloId', 'Cantidad'], 'required'],
            [['ArticuloId', 'Cantidad'], 'integer'],
            [['ArticuloId'], 'exist', 'skipOnError' => true, 'targetClass' => Articulo::className(), 'targetAttribute' => ['ArticuloId' => 'ArticuloId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'StockId' => 'Stock ID',
            'ArticuloId' => 'Articulo ID',
            'Cantidad' => 'Cantidad',
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
