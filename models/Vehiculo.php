<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehiculo".
 *
 * @property int $id
 * @property int $idCliente
 * @property string $placa
 * @property string|null $chasis
 * @property string|null $motor
 * @property string|null $color1
 * @property string|null $color2
 * @property string|null $color3
 * @property string|null $carroceria
 * @property string|null $combustible
 * @property string|null $peso
 * @property string|null $cilindraje
 * @property string|null $tipo
 * @property string|null $clase
 * @property string|null $modelo
 * @property int|null $anio
 * @property string|null $imagen
 *
 * @property CabeceraOrdenTrabajo[] $cabeceraOrdenTrabajos
 * @property Cliente $idCliente0
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehiculo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCliente', 'placa'], 'required'],
            [['idCliente', 'anio'], 'default', 'value' => null],
            [['idCliente', 'anio'], 'integer'],
            [['imagen'], 'string'],
            [['placa', 'carroceria', 'combustible', 'peso'], 'string', 'max' => 10],
            [['chasis', 'motor', 'tipo', 'clase', 'modelo'], 'string', 'max' => 50],
            [['color1', 'color2', 'color3'], 'string', 'max' => 20],
            [['cilindraje'], 'string', 'max' => 5],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['idCliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCliente' => 'Id Cliente',
            'placa' => 'Placa',
            'chasis' => 'Chasis',
            'motor' => 'Motor',
            'color1' => 'Color 1',
            'color2' => 'Color 2',
            'color3' => 'Color 3',
            'carroceria' => 'Carroceria',
            'combustible' => 'Combustible',
            'peso' => 'Peso',
            'cilindraje' => 'Cilindraje',
            'tipo' => 'Tipo',
            'clase' => 'Clase',
            'modelo' => 'Modelo',
            'anio' => 'Anio',
            'imagen' => 'Imagen',
        ];
    }

    /**
     * Gets query for [[CabeceraOrdenTrabajos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCabeceraOrdenTrabajos()
    {
        return $this->hasMany(CabeceraOrdenTrabajo::className(), ['idVehiculo' => 'id']);
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'idCliente']);
    }
}
