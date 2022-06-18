<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetalleIngreso;

/**
 * DetalleIngresoSearch represents the model behind the search form of `app\models\DetalleIngreso`.
 */
class DetalleIngresoSearch extends DetalleIngreso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idIngreso', 'idInventario'], 'integer'],
            [['nombreItem'], 'safe'],
            [['cantidad', 'precio', 'porc_iva', 'iva', 'porc_descuento', 'descuento', 'total'], 'number'],
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
    public function search($params)
    {
        $query = DetalleIngreso::find();

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
            'idIngreso' => $this->idIngreso,
            'idInventario' => $this->idInventario,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'porc_iva' => $this->porc_iva,
            'iva' => $this->iva,
            'porc_descuento' => $this->porc_descuento,
            'descuento' => $this->descuento,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['ilike', 'nombreItem', $this->nombreItem]);

        return $dataProvider;
    }
}
