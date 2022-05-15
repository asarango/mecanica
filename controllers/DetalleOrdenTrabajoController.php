<?php

namespace app\controllers;

use app\models\DetalleOrdenTrabajo;
use app\models\DetalleOrdenTrabajoSearch;
use app\models\TipoTrabajo;
use app\models\Util\Sql;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DetalleOrdenTrabajoController implements the CRUD actions for DetalleOrdenTrabajo model.
 */
class DetalleOrdenTrabajoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all DetalleOrdenTrabajo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $cabeceraId = $_GET['id'];

        $searchModel = new DetalleOrdenTrabajoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, $cabeceraId);        

        $trabajos = $this->get_tipos_trabajos($cabeceraId);
        $listaTrabajos = ArrayHelper::map($trabajos,'id', 'nombre');

        $sql = new Sql();
        $cabecera = $sql->select_cabecera_orden_trabajo($cabeceraId);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'listaTrabajos' => $listaTrabajos,
            'cabecera' => $cabecera
        ]);
    }

    private function get_tipos_trabajos($cabeceraId){
        $con = Yii::$app->db;
        $query = 'select 	tt.id, tt.nombre 
        from	detalle_orden_trabajo d
                inner join tipo_trabajo tt  on tt.id = d."idTrabajosARealizar" 		
        where   d."idCabOrden" = '.$cabeceraId;
        
        $res = $con->createCommand($query)->queryAll();
        return $res;
    }

    /**
     * Displays a single DetalleOrdenTrabajo model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DetalleOrdenTrabajo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new DetalleOrdenTrabajo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing DetalleOrdenTrabajo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing DetalleOrdenTrabajo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetalleOrdenTrabajo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return DetalleOrdenTrabajo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetalleOrdenTrabajo::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
