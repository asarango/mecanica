<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingreso".
 *
 * @property int $id
 * @property int $num_ingreso
 * @property string $fecha_ingreso
 * @property float $subtotal
 * @property float $porc_iva
 * @property float $val_iva
 * @property float $porc_descuento
 * @property float $val_descuento
 * @property string $creado_por
 * @property string $fecha_creacion
 * @property string|null $observacion
 *
 * @property DetalleIngreso[] $detalleIngresos
 */
class Ingreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_ingreso', 'fecha_ingreso', 'subtotal', 'porc_iva', 'val_iva', 'porc_descuento', 'val_descuento', 'creado_por', 'fecha_creacion'], 'required'],
            [['num_ingreso'], 'default', 'value' => null],
            [['num_ingreso'], 'integer'],
            [['fecha_ingreso', 'fecha_creacion'], 'safe'],
            [['subtotal', 'porc_iva', 'val_iva', 'porc_descuento', 'val_descuento'], 'number'],
            [['creado_por'], 'string', 'max' => 10],
            [['observacion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_ingreso' => 'Num Ingreso',
            'fecha_ingreso' => 'Fecha Ingreso',
            'subtotal' => 'Subtotal',
            'porc_iva' => 'Porc Iva',
            'val_iva' => 'Val Iva',
            'porc_descuento' => 'Porc Descuento',
            'val_descuento' => 'Val Descuento',
            'creado_por' => 'Creado Por',
            'fecha_creacion' => 'Fecha Creacion',
            'observacion' => 'Observacion',
        ];
    }

    /**
     * Gets query for [[DetalleIngresos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleIngresos()
    {
        return $this->hasMany(DetalleIngreso::className(), ['idIngreso' => 'id']);
    }
}
