<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mecanico".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $especialidad
 *
 * @property DetalleOrdenTrabajo[] $detalleOrdenTrabajos
 */
class Mecanico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mecanico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['especialidad'], 'string', 'max' => 50],
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
            'especialidad' => 'Especialidad',
        ];
    }

    /**
     * Gets query for [[DetalleOrdenTrabajos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOrdenTrabajos()
    {
        return $this->hasMany(DetalleOrdenTrabajo::className(), ['idMecanico' => 'id']);
    }
}
