<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bodegas".
 *
 * @property int $id
 * @property string $nombre
 * @property int $numero
 *
 * @property BodegaInventario[] $bodegaInventarios
 */
class Bodegas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bodegas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'numero'], 'required'],
            [['numero'], 'default', 'value' => null],
            [['numero'], 'integer'],
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
            'numero' => 'Numero',
        ];
    }

    /**
     * Gets query for [[BodegaInventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBodegaInventarios()
    {
        return $this->hasMany(BodegaInventario::className(), ['idBodega' => 'id']);
    }
}
