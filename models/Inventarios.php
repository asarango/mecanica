<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventarios".
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property float $precos
 * @property float $preven
 * @property float $porc_aut_venta
 *
 * @property BodegaInventario[] $bodegaInventarios
 * @property DetalleEgreso[] $detalleEgresos
 * @property DetalleIngreso[] $detalleIngresos
 */
class Inventarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'precos', 'preven', 'porc_aut_venta'], 'required'],
            [['precos', 'preven', 'porc_aut_venta'], 'number'],
            [['codigo'], 'string', 'max' => 30],
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
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'precos' => 'Precos',
            'preven' => 'Preven',
            'porc_aut_venta' => 'Porc Aut Venta',
        ];
    }

    /**
     * Gets query for [[BodegaInventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBodegaInventarios()
    {
        return $this->hasMany(BodegaInventario::className(), ['idInventario' => 'id']);
    }

    /**
     * Gets query for [[DetalleEgresos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleEgresos()
    {
        return $this->hasMany(DetalleEgreso::className(), ['idInventario' => 'id']);
    }

    /**
     * Gets query for [[DetalleIngresos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleIngresos()
    {
        return $this->hasMany(DetalleIngreso::className(), ['idInventario' => 'id']);
    }
}
