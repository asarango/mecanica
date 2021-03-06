<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Egreso;

/**
 * EgresoSearch represents the model behind the search form of `app\models\Egreso`.
 */
class EgresoSearch extends Egreso
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fecha_egreso', 'creado_por', 'fecha_creacion', 'observacion', 'estado', 'obs_estado'], 'safe'],
            [['subtotal', 'porc_iva', 'val_iva', 'porc_descuento', 'val_descuento'], 'number'],
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
        $query = Egreso::find();

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
            'fecha_egreso' => $this->fecha_egreso,
            'subtotal' => $this->subtotal,
            'porc_iva' => $this->porc_iva,
            'val_iva' => $this->val_iva,
            'porc_descuento' => $this->porc_descuento,
            'val_descuento' => $this->val_descuento,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['ilike', 'creado_por', $this->creado_por])
            ->andFilterWhere(['ilike', 'observacion', $this->observacion])
            ->andFilterWhere(['ilike', 'estado', $this->estado])
            ->andFilterWhere(['ilike', 'obs_estado', $this->obs_estado]);

        return $dataProvider;
    }
}
