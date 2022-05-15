<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cabecera_orden_trabajo".
 *
 * @property int $id
 * @property string $fecha_ingreso
 * @property string $fecha_entrega
 * @property int $idTipoOrden
 * @property int $idVehiculo
 * @property int $idAsesor
 * @property int $kilometraje
 * @property string|null $fotoIngresoVehiculo
 * @property string|null $fotoSalidaVehiculo
 * @property bool $esAbierta
 * @property int $numero_orden
 * @property string $fecha_terminacion_trabajo
 * @property int|null $calificacion
 *
 * @property DetalleOrdenTrabajo[] $detalleOrdenTrabajos
 * @property Asesor $idAsesor0
 * @property TipoOrden $idTipoOrden0
 * @property Vehiculo $idVehiculo0
 * @property OrdenTrabajoEgreso[] $ordenTrabajoEgresos
 */
class CabeceraOrdenTrabajo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cabecera_orden_trabajo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_ingreso', 'fecha_entrega', 'idTipoOrden', 'idVehiculo', 'idAsesor', 'kilometraje', 'esAbierta', 'numero_orden', 'fecha_terminacion_trabajo'], 'required'],
            [['fecha_ingreso', 'fecha_entrega', 'fecha_terminacion_trabajo'], 'safe'],
            [['idTipoOrden', 'idVehiculo', 'idAsesor', 'kilometraje', 'numero_orden', 'calificacion'], 'default', 'value' => null],
            [['idTipoOrden', 'idVehiculo', 'idAsesor', 'kilometraje', 'numero_orden', 'calificacion'], 'integer'],
            [['fotoIngresoVehiculo', 'fotoSalidaVehiculo'], 'string'],
            [['esAbierta'], 'boolean'],
            [['idAsesor'], 'exist', 'skipOnError' => true, 'targetClass' => Asesor::className(), 'targetAttribute' => ['idAsesor' => 'id']],
            [['idTipoOrden'], 'exist', 'skipOnError' => true, 'targetClass' => TipoOrden::className(), 'targetAttribute' => ['idTipoOrden' => 'id']],
            [['idVehiculo'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['idVehiculo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_ingreso' => 'Fecha Ingreso',
            'fecha_entrega' => 'Fecha Entrega',
            'idTipoOrden' => 'Id Tipo Orden',
            'idVehiculo' => 'Id Vehiculo',
            'idAsesor' => 'Id Asesor',
            'kilometraje' => 'Kilometraje',
            'fotoIngresoVehiculo' => 'Foto Ingreso Vehiculo',
            'fotoSalidaVehiculo' => 'Foto Salida Vehiculo',
            'esAbierta' => 'Es Abierta',
            'numero_orden' => 'Numero Orden',
            'fecha_terminacion_trabajo' => 'Fecha Terminacion Trabajo',
            'calificacion' => 'Calificacion',
        ];
    }

    /**
     * Gets query for [[DetalleOrdenTrabajos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOrdenTrabajos()
    {
        return $this->hasMany(DetalleOrdenTrabajo::className(), ['idCabOrden' => 'id']);
    }

    /**
     * Gets query for [[IdAsesor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsesor0()
    {
        return $this->hasOne(Asesor::className(), ['id' => 'idAsesor']);
    }

    /**
     * Gets query for [[IdTipoOrden0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoOrden0()
    {
        return $this->hasOne(TipoOrden::className(), ['id' => 'idTipoOrden']);
    }

    /**
     * Gets query for [[IdVehiculo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVehiculo0()
    {
        return $this->hasOne(Vehiculo::className(), ['id' => 'idVehiculo']);
    }

    /**
     * Gets query for [[OrdenTrabajoEgresos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenTrabajoEgresos()
    {
        return $this->hasMany(OrdenTrabajoEgreso::className(), ['idOrdenTrrabajo' => 'id']);
    }
}
