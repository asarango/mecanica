<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_egreso".
 *
 * @property int $id
 * @property int $idEgreso
 * @property int $idInventario
 * @property string $nombreItem
 * @property float $cantidad
 * @property float $precio
 * @property float $iva
 * @property float $porc_descuento
 * @property float $descuento
 * @property float $total
 * @property float $porc_iva
 *
 * @property Egreso $idEgreso0
 * @property Inventarios $idInventario0
 */
class DetalleEgreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_egreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEgreso', 'idInventario', 'nombreItem', 'cantidad', 'precio', 'iva', 'porc_descuento', 'descuento', 'total', 'porc_iva'], 'required'],
            [['idEgreso', 'idInventario'], 'default', 'value' => null],
            [['idEgreso', 'idInventario'], 'integer'],
            [['cantidad', 'precio', 'iva', 'porc_descuento', 'descuento', 'total', 'porc_iva'], 'number'],
            [['nombreItem'], 'string', 'max' => 100],
            [['idEgreso'], 'exist', 'skipOnError' => true, 'targetClass' => Egreso::className(), 'targetAttribute' => ['idEgreso' => 'id']],
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
            'idEgreso' => 'Id Egreso',
            'idInventario' => 'Id Inventario',
            'nombreItem' => 'Nombre Item',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            'iva' => 'Iva',
            'porc_descuento' => 'Porc Descuento',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'porc_iva' => 'Porc Iva',
        ];
    }

    /**
     * Gets query for [[IdEgreso0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEgreso0()
    {
        return $this->hasOne(Egreso::className(), ['id' => 'idEgreso']);
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
