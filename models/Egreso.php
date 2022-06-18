<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "egreso".
 *
 * @property int $id
 * @property string $fecha_egreso
 * @property float $subtotal
 * @property float $porc_iva
 * @property float $val_iva
 * @property float $porc_descuento
 * @property float $val_descuento
 * @property string $creado_por
 * @property string $fecha_creacion
 * @property string|null $observacion
 * @property string $estado
 * @property string|null $obs_estado
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
            [['fecha_egreso', 'creado_por', 'fecha_creacion', 'estado'], 'required'],
            [['fecha_egreso', 'fecha_creacion'], 'safe'],
            [['subtotal', 'porc_iva', 'val_iva', 'porc_descuento', 'val_descuento'], 'number'],
            [['creado_por'], 'string', 'max' => 10],
            [['observacion', 'obs_estado'], 'string', 'max' => 255],
            [['estado'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_egreso' => 'Fecha Egreso',
            'subtotal' => 'Subtotal',
            'porc_iva' => 'Porc Iva',
            'val_iva' => 'Val Iva',
            'porc_descuento' => 'Porc Descuento',
            'val_descuento' => 'Val Descuento',
            'creado_por' => 'Creado Por',
            'fecha_creacion' => 'Fecha Creacion',
            'observacion' => 'Observacion',
            'estado' => 'Estado',
            'obs_estado' => 'Obs Estado',
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
