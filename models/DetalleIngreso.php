<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_ingreso".
 *
 * @property int $id
 * @property int $idIngreso
 * @property int $idInventario
 * @property string $nombreItem
 * @property float $cantidad
 * @property float $precio
 * @property float $iva
 * @property float $porc_descuento
 * @property float $descuento
 * @property float $total
 *
 * @property Ingreso $idIngreso0
 * @property Inventarios $idInventario0
 */
class DetalleIngreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_ingreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idIngreso', 'idInventario', 'nombreItem', 'cantidad', 'precio', 'iva', 'porc_descuento', 'descuento', 'total'], 'required'],
            [['idIngreso', 'idInventario'], 'default', 'value' => null],
            [['idIngreso', 'idInventario'], 'integer'],
            [['cantidad', 'precio', 'iva', 'porc_descuento', 'descuento', 'total'], 'number'],
            [['nombreItem'], 'string', 'max' => 100],
            [['idIngreso'], 'exist', 'skipOnError' => true, 'targetClass' => Ingreso::className(), 'targetAttribute' => ['idIngreso' => 'id']],
            [['idInventario'], 'exist', 'skipOnError' => true, 'targetClass' => Inventarios::className(), 'targetAttribute' => ['idInventario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idIngreso' => 'Id Ingreso',
            'idInventario' => 'Id Inventario',
            'nombreItem' => 'Nombre Item',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            'iva' => 'Iva',
            'porc_descuento' => 'Porc Descuento',
            'descuento' => 'Descuento',
            'total' => 'Total',
        ];
    }

    /**
     * Gets query for [[IdIngreso0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdIngreso0()
    {
        return $this->hasOne(Ingreso::className(), ['id' => 'idIngreso']);
    }

    /**
     * Gets query for [[IdInventario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdInventario0()
    {
        return $this->hasOne(Inventarios::className(), ['id' => 'idInventario']);
    }
}
