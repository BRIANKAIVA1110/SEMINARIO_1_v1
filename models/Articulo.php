<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "articulo".
 *
 * @property int $ArticuloId
 * @property int $ModeloId
 * @property int $ColorId
 * @property string $Descripcion
 * @property string $CodigoBarras
 *
 * @property Color $color
 * @property Modelo $modelo
 * @property Articuloxventas[] $articuloxventas
 * @property Precio[] $precios
 * @property Stock[] $stocks
 * @property Venta[] $ventas
 */
class Articulo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ModeloId', 'ColorId', 'Descripcion'], 'required'],
            [['ModeloId', 'ColorId'], 'integer'],
            [['Descripcion'], 'string', 'max' => 100],
            [['CodigoBarras'], 'string', 'max' => 15],
            [['ColorId'], 'exist', 'skipOnError' => true, 'targetClass' => Color::className(), 'targetAttribute' => ['ColorId' => 'ColorId']],
            [['ModeloId'], 'exist', 'skipOnError' => true, 'targetClass' => Modelo::className(), 'targetAttribute' => ['ModeloId' => 'ModeloId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ArticuloId' => 'Articulo ID',
            'ModeloId' => 'Modelo ID',
            'ColorId' => 'Color ID',
            'Descripcion' => 'Descripcion',
            'CodigoBarras' => 'Codigo Barras',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::className(), ['ColorId' => 'ColorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelo()
    {
        return $this->hasOne(Modelo::className(), ['ModeloId' => 'ModeloId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloxventas()
    {
        return $this->hasMany(Articuloxventas::className(), ['ArticuloId' => 'ArticuloId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrecios()
    {
        return $this->hasMany(Precio::className(), ['ArticuloId' => 'ArticuloId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['ArticuloId' => 'ArticuloId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['ArticuloId' => 'ArticuloId']);
    }
}
