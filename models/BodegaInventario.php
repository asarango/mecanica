<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bodega_inventario".
 *
 * @property int $id
 * @property int $idBodega
 * @property int $idInventario
 * @property float $stock
 * @property float $minimo
 * @property float $maximo
 *
 * @property Bodegas $idBodega0
 * @property Inventarios $idInventario0
 */
class BodegaInventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bodega_inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBodega', 'idInventario', 'stock', 'minimo', 'maximo'], 'required'],
            [['idBodega', 'idInventario'], 'default', 'value' => null],
            [['idBodega', 'idInventario'], 'integer'],
            [['stock', 'minimo', 'maximo'], 'number'],
            [['idBodega'], 'exist', 'skipOnError' => true, 'targetClass' => Bodegas::className(), 'targetAttribute' => ['idBodega' => 'id']],
            [['idInventario'], 'exist', 'skipOnError' => true, 'targetClass' => Inventarios::className(), 'targetAttribute' => ['idInventario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idBodega' => 'Id Bodega',
            'idInventario' => 'Id Inventario',
            'stock' => 'Stock',
            'minimo' => 'Minimo',
            'maximo' => 'Maximo',
        ];
    }

    /**
     * Gets query for [[IdBodega0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBodega0()
    {
        return $this->hasOne(Bodegas::className(), ['id' => 'idBodega']);
    }

    /**
     * Gets query for [[IdInventario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdInventario0()
    {
        return $this->hasOne(Inventarios::className(), ['id' => 'idInventario']);
    }
}
