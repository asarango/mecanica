<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden_trabajo_egreso".
 *
 * @property int $id
 * @property int $idOrdenTrrabajo
 * @property int $idEgreso
 *
 * @property Egreso $idEgreso0
 * @property CabeceraOrdenTrabajo $idOrdenTrrabajo0
 */
class OrdenTrabajoEgreso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orden_trabajo_egreso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idOrdenTrrabajo', 'idEgreso'], 'required'],
            [['idOrdenTrrabajo', 'idEgreso'], 'default', 'value' => null],
            [['idOrdenTrrabajo', 'idEgreso'], 'integer'],
            [['idOrdenTrrabajo'], 'exist', 'skipOnError' => true, 'targetClass' => CabeceraOrdenTrabajo::className(), 'targetAttribute' => ['idOrdenTrrabajo' => 'id']],
            [['idEgreso'], 'exist', 'skipOnError' => true, 'targetClass' => Egreso::className(), 'targetAttribute' => ['idEgreso' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idOrdenTrrabajo' => 'Id Orden Trrabajo',
            'idEgreso' => 'Id Egreso',
        ];
    }

    /**
     * Gets query for [[IdEgreso0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEgreso0()
    {
        return $this->hasOne(Egreso::className(), ['id' => 'idEgreso']);
    }

    /**
     * Gets query for [[IdOrdenTrrabajo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrdenTrrabajo0()
    {
        return $this->hasOne(CabeceraOrdenTrabajo::className(), ['id' => 'idOrdenTrrabajo']);
    }
}
