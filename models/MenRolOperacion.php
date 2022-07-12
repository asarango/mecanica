<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "men_rol_operacion".
 *
 * @property int $id
 * @property int $rol_id
 * @property int $operacion_id
 *
 * @property MenOperacion $operacion
 * @property Rol $rol
 */
class MenRolOperacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'men_rol_operacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rol_id', 'operacion_id'], 'required'],
            [['rol_id', 'operacion_id'], 'default', 'value' => null],
            [['rol_id', 'operacion_id'], 'integer'],
            [['operacion_id'], 'exist', 'skipOnError' => true, 'targetClass' => MenOperacion::className(), 'targetAttribute' => ['operacion_id' => 'id']],
            [['rol_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rol_id' => 'Rol ID',
            'operacion_id' => 'Operacion ID',
        ];
    }

    /**
     * Gets query for [[Operacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperacion()
    {
        return $this->hasOne(MenOperacion::className(), ['id' => 'operacion_id']);
    }

    /**
     * Gets query for [[Rol]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['id' => 'rol_id']);
    }
}
