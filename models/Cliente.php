<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $ClienteId
 * @property string $Nombre
 * @property string $Apellido
 * @property string $email
 * @property string $Domicilio
 *
 * @property Venta[] $ventas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellido', 'email', 'Domicilio'], 'required'],
            [['Nombre', 'Apellido', 'email', 'Domicilio'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ClienteId' => 'Cliente ID',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'email' => 'Email',
            'Domicilio' => 'Domicilio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['ClienteId' => 'ClienteId']);
    }
}
