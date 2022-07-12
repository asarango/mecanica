<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "men_operacion".
 *
 * @property int $id
 * @property int $menu_id
 * @property string $accion_yii
 * @property string $nombre
 * @property bool $es_activo
 * @property string $icono
 *
 * @property MenRolOperacion[] $menRolOperacions
 * @property MenMenu $menu
 */
class MenOperacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'men_operacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'accion_yii', 'nombre'], 'required'],
            [['menu_id'], 'default', 'value' => null],
            [['menu_id'], 'integer'],
            [['es_activo'], 'boolean'],
            [['accion_yii', 'icono'], 'string', 'max' => 80],
            [['nombre'], 'string', 'max' => 50],
            [['accion_yii'], 'unique'],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => MenMenu::className(), 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'accion_yii' => 'Accion Yii',
            'nombre' => 'Nombre',
            'es_activo' => 'Es Activo',
            'icono' => 'Icono',
        ];
    }

    /**
     * Gets query for [[MenRolOperacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenRolOperacions()
    {
        return $this->hasMany(MenRolOperacion::className(), ['operacion_id' => 'id']);
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(MenMenu::className(), ['id' => 'menu_id']);
    }
}
