<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_orden".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property CabeceraOrdenTrabajo[] $cabeceraOrdenTrabajos
 */
class TipoOrden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_orden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * Gets query for [[CabeceraOrdenTrabajos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCabeceraOrdenTrabajos()
    {
        return $this->hasMany(CabeceraOrdenTrabajo::className(), ['idTipoOrden' => 'id']);
    }
}
