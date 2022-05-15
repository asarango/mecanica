<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalle_orden_trabajo".
 *
 * @property int $id
 * @property int $idCabOrden
 * @property int $idTrabajosARealizar
 * @property bool $seRealizo
 * @property float $subtotal
 * @property float $iva
 * @property float $porc_descuento
 * @property float $descuento
 * @property float $total
 * @property string|null $comentarios
 * @property int $idMecanico
 *
 * @property CabeceraOrdenTrabajo $idCabOrden0
 * @property Mecanico $idMecanico0
 * @property TipoTrabajo $idTrabajosARealizar0
 */
class DetalleOrdenTrabajo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalle_orden_trabajo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCabOrden', 'idTrabajosARealizar', 'seRealizo', 'subtotal', 'iva', 'porc_descuento', 'descuento', 'total', 'idMecanico'], 'required'],
            [['idCabOrden', 'idTrabajosARealizar', 'idMecanico'], 'default', 'value' => null],
            [['idCabOrden', 'idTrabajosARealizar', 'idMecanico'], 'integer'],
            [['seRealizo'], 'boolean'],
            [['subtotal', 'iva', 'porc_descuento', 'descuento', 'total'], 'number'],
            [['comentarios'], 'string'],
            [['idCabOrden'], 'exist', 'skipOnError' => true, 'targetClass' => CabeceraOrdenTrabajo::className(), 'targetAttribute' => ['idCabOrden' => 'id']],
            [['idMecanico'], 'exist', 'skipOnError' => true, 'targetClass' => Mecanico::className(), 'targetAttribute' => ['idMecanico' => 'id']],
            [['idTrabajosARealizar'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTrabajo::className(), 'targetAttribute' => ['idTrabajosARealizar' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCabOrden' => 'Id Cab Orden',
            'idTrabajosARealizar' => 'Id Trabajos A Realizar',
            'seRealizo' => 'Se Realizo',
            'subtotal' => 'Subtotal',
            'iva' => 'Iva',
            'porc_descuento' => 'Porc Descuento',
            'descuento' => 'Descuento',
            'total' => 'Total',
            'comentarios' => 'Comentarios',
            'idMecanico' => 'Id Mecanico',
        ];
    }

    /**
     * Gets query for [[IdCabOrden0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCabOrden0()
    {
        return $this->hasOne(CabeceraOrdenTrabajo::className(), ['id' => 'idCabOrden']);
    }

    /**
     * Gets query for [[IdMecanico0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMecanico0()
    {
        return $this->hasOne(Mecanico::className(), ['id' => 'idMecanico']);
    }

    /**
     * Gets query for [[IdTrabajosARealizar0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTrabajosARealizar0()
    {
        return $this->hasOne(TipoTrabajo::className(), ['id' => 'idTrabajosARealizar']);
    }
}
