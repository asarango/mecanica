<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Modelo".
 *
 * @property int $id
 * @property string|null $nombre
 * @property int $idMarca
 *
 * @property Marca $idMarca0
 */
class Modelo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Modelo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idMarca'], 'required'],
            [['idMarca'], 'default', 'value' => null],
            [['idMarca'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['idMarca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::className(), 'targetAttribute' => ['idMarca' => 'id']],
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
            'idMarca' => 'Id Marca',
        ];
    }

    /**
     * Gets query for [[IdMarca0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdMarca0()
    {
        return $this->hasOne(Marca::className(), ['id' => 'idMarca']);
    }
}
