<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CabeceraOrdenTrabajo;

/**
 * CabeceraOrdenTrabajoSearch represents the model behind the search form of `app\models\CabeceraOrdenTrabajo`.
 */
class CabeceraOrdenTrabajoSearch extends CabeceraOrdenTrabajo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idTipoOrden', 'idVehiculo', 'idAsesor', 'kilometraje', 'numero_orden', 'calificacion'], 'integer'],
            [['fecha_ingreso', 'fecha_entrega', 'fotoIngresoVehiculo', 'fotoSalidaVehiculo', 'fecha_terminacion_trabajo','indicaCliente','diagnostico'], 'safe'],
            [['esAbierta'], 'boolean'],
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
        $query = CabeceraOrdenTrabajo::find();

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
            'fecha_ingreso' => $this->fecha_ingreso,
            'fecha_entrega' => $this->fecha_entrega,
            'idTipoOrden' => $this->idTipoOrden,
            'idVehiculo' => $this->idVehiculo,
            'idAsesor' => $this->idAsesor,
            'kilometraje' => $this->kilometraje,
            'esAbierta' => $this->esAbierta,
            'numero_orden' => $this->numero_orden,
            'fecha_terminacion_trabajo' => $this->fecha_terminacion_trabajo,
            'calificacion' => $this->calificacion,
        ]);

        $query->andFilterWhere(['ilike', 'fotoIngresoVehiculo', $this->fotoIngresoVehiculo])
            ->andFilterWhere(['ilike', 'fotoSalidaVehiculo', $this->fotoSalidaVehiculo])
            ->andFilterWhere(['ilike', 'indicaCliente', $this->fotoSalidaVehiculo])
            ->andFilterWhere(['ilike', 'diagnostico', $this->fotoSalidaVehiculo]);

        return $dataProvider;
    }
}
