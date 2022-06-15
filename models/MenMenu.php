<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "men_menu".
 *
 * @property int $id
 * @property string $nombre
 * @property bool $es_activo
 * @property string $icono
 *
 * @property MenOperacion[] $menOperacions
 */
class MenMenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'men_menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['es_activo'], 'boolean'],
            [['nombre'], 'string', 'max' => 50],
            [['icono'], 'string', 'max' => 80],
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
            'es_activo' => 'Es Activo',
            'icono' => 'Icono',
        ];
    }

    /**
     * Gets query for [[MenOperacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenOperacions()
    {
        return $this->hasMany(MenOperacion::className(), ['menu_id' => 'id']);
    }
}
