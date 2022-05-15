<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_trabajo".
 *
 * @property int $id
 * @property string|null $nombre
 *
 * @property DetalleOrdenTrabajo[] $detalleOrdenTrabajos
 */
class TipoTrabajo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_trabajo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre','precio'],'required'],
            [['nombre'], 'string', 'max' => 50],
            [['precio'], 'number'],
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
     * Gets query for [[DetalleOrdenTrabajos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOrdenTrabajos()
    {
        return $this->hasMany(DetalleOrdenTrabajo::className(), ['idTrabajosARealizar' => 'id']);
    }
}
