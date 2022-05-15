<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nombre
 * @property string $ruc_cedula
 * @property string|null $direccion
 * @property string|null $telf1
 * @property string|null $telf2
 * @property string|null $telf3
 * @property string|null $email1
 * @property string|null $email2
 * @property string|null $email3
 * @property string $creado_fec
 * @property string $creado_usu
 * @property string|null $actualizo_fec
 * @property string|null $actualizo_usu
 * @property int $id_tipo_cliente
 *
 * @property TipoCliente $tipoCliente
 * @property Vehiculo[] $vehiculos
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
            [['nombre', 'ruc_cedula', 'creado_fec', 'creado_usu', 'id_tipo_cliente'], 'required'],
            [['creado_fec', 'actualizo_fec'], 'safe'],
            [['id_tipo_cliente'], 'default', 'value' => null],
            [['id_tipo_cliente'], 'integer'],
            [['nombre', 'direccion'], 'string', 'max' => 255],
            [['ruc_cedula', 'telf1', 'telf2', 'telf3'], 'string', 'max' => 20],
            [['email1', 'email2', 'email3', 'creado_usu', 'actualizo_usu'], 'string', 'max' => 50],
            [['id_tipo_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCliente::className(), 'targetAttribute' => ['id_tipo_cliente' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'ruc_cedula' => 'Ruc Cedula',
            'direccion' => 'Direccion',
            'telf1' => 'Telf 1',
            'telf2' => 'Telf 2',
            'telf3' => 'Telf 3',
            'email1' => 'Email 1',
            'email2' => 'Email 2',
            'email3' => 'Email 3',
            'creado_fec' => 'Creado Fec',
            'creado_usu' => 'Creado Usu',
            'actualizo_fec' => 'Actualizo Fec',
            'actualizo_usu' => 'Actualizo Usu',
            'id_tipo_cliente' => 'Id Tipo Cliente',
        ];
    }

    /**
     * Gets query for [[TipoCliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoCliente()
    {
        return $this->hasOne(TipoCliente::className(), ['id' => 'id_tipo_cliente']);
    }

    /**
     * Gets query for [[Vehiculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['idCliente' => 'id']);
    }
}
