<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetalleOrdenTrabajo;

/**
 * DetalleOrdenTrabajoSearch represents the model behind the search form of `app\models\DetalleOrdenTrabajo`.
 */
class DetalleOrdenTrabajoSearch extends DetalleOrdenTrabajo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idCabOrden', 'idTrabajosARealizar', 'idMecanico'], 'integer'],
            [['seRealizo'], 'boolean'],
            [['subtotal', 'iva', 'porc_descuento', 'descuento', 'total'], 'number'],
            [['comentarios'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $cabeceraId)
    {
        $query = DetalleOrdenTrabajo::find()->where([
            'idCabOrden' => $cabeceraId
        ]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idCabOrden' => $this->idCabOrden,
            'idTrabajosARealizar' => $this->idTrabajosARealizar,
            'seRealizo' => $this->seRealizo,
            'subtotal' => $this->subtotal,
            'iva' => $this->iva,
            'porc_descuento' => $this->porc_descuento,
            'descuento' => $this->descuento,
            'total' => $this->total,
            'idMecanico' => $this->idMecanico,
        ]);

        $query->andFilterWhere(['ilike', 'comentarios', $this->comentarios]);

        return $dataProvider;
    }
}
