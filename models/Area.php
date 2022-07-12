<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $id
 * @property string $nombre_area
 * @property int $idTipoArea
 * @property string $code
 *
 * @property TipoArea $idTipoArea0
 * @property Inventarios[] $inventarios
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_area', 'idTipoArea', 'code'], 'required'],
            [['idTipoArea'], 'default', 'value' => null],
            [['idTipoArea'], 'integer'],
            [['nombre_area'], 'string', 'max' => 50],
            [['code'], 'string', 'max' => 10],
            [['idTipoArea'], 'exist', 'skipOnError' => true, 'targetClass' => TipoArea::className(), 'targetAttribute' => ['idTipoArea' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_area' => 'Nombre Area',
            'idTipoArea' => 'Id Tipo Area',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[IdTipoArea0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoArea0()
    {
        return $this->hasOne(TipoArea::className(), ['id' => 'idTipoArea']);
    }

    /**
     * Gets query for [[Inventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventarios::className(), ['id_area' => 'id']);
    }
}
