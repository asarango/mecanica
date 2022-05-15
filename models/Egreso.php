<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "egreso".
 *
 * @property int $id
 * @property int $num_egreso
 * @property string $fecha_egreso
 * @property float $subtotal
 * @property float $porc_iva
 * @property float $val_iva
 * @property float $porc_descuento
 * @property float $val_descuento
 * @property string $creado_por
 * @property string $fecha_creacion
 * @property string|null $observacion
 *
 * @property DetalleEgreso[] $detalleEgresos
 * @property OrdenTrabajoEgreso[] $ordenTrabajoEgresos
 */
class Egreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'egreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_egreso', 'fecha_egreso', 'subtotal', 'porc_iva', 'val_iva', 'porc_descuento', 'val_descuento', 'creado_por', 'fecha_creacion'], 'required'],
            [['num_egreso'], 'default', 'value' => null],
            [['num_egreso'], 'integer'],
            [['fecha_egreso', 'fecha_creacion'], 'safe'],
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
            'num_egreso' => 'Num Egreso',
            'fecha_egreso' => 'Fecha Egreso',
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
     * Gets query for [[DetalleEgresos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleEgresos()
    {
        return $this->hasMany(DetalleEgreso::className(), ['idEgreso' => 'id']);
    }

    /**
     * Gets query for [[OrdenTrabajoEgresos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenTrabajoEgresos()
    {
        return $this->hasMany(OrdenTrabajoEgreso::className(), ['idEgreso' => 'id']);
    }
}
