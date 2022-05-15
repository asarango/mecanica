<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asesor".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property CabeceraOrdenTrabajo[] $cabeceraOrdenTrabajos
 */
class Asesor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
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
        return $this->hasMany(CabeceraOrdenTrabajo::className(), ['idAsesor' => 'id']);
    }
}
