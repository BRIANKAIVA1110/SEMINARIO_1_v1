<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property int $VentaId
 * @property int $ClienteId
 * @property int $ArticuloId
 * @property int $Cantidad
 * @property int $Total
 *
 * @property Articuloxventas[] $articuloxventas
 * @property Articulo $articulo
 * @property Cliente $cliente
 */
class Venta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ClienteId', 'ArticuloId', 'Cantidad', 'Total'], 'required'],
            [['ClienteId', 'ArticuloId', 'Cantidad', 'Total'], 'integer'],
            [['ArticuloId'], 'exist', 'skipOnError' => true, 'targetClass' => Articulo::className(), 'targetAttribute' => ['ArticuloId' => 'ArticuloId']],
            [['ClienteId'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['ClienteId' => 'ClienteId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'VentaId' => 'Venta ID',
            'ClienteId' => 'Cliente ID',
            'ArticuloId' => 'Articulo ID',
            'Cantidad' => 'Cantidad',
            'Total' => 'Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloxventas()
    {
        return $this->hasMany(Articuloxventas::className(), ['VentaId' => 'VentaId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulo()
    {
        return $this->hasOne(Articulo::className(), ['ArticuloId' => 'ArticuloId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['ClienteId' => 'ClienteId']);
    }
}
