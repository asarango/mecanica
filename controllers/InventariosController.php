<?php

namespace app\controllers;

use app\models\Inventarios;
use app\models\Area;
use app\models\InventariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventariosController implements the CRUD actions for Inventarios model.
 */
class InventariosController extends Controller
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
     * Lists all Inventarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new InventariosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inventarios model.
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
     * Creates a new Inventarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Inventarios();      
        $arrayTieneIva = [ 0 => 'NO', 1 => 'SI'];  
        $modelAreas = \yii\helpers\ArrayHelper::map(Area::find()->all(), 'id', 'nombre_area');   

        if ($this->request->isPost) 
        {
            if ($model->load($this->request->post())) 
            {
                $precos = $model->precos;
                $preven = $model->preven;
                $porcentaje = (1-round(($precos/$preven),2))*100;
                $model->porc_aut_venta =$porcentaje;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelAreas'=>$modelAreas,
            'arrayTieneIva'=>$arrayTieneIva,
        ]);
    }

    /**
     * Updates an existing Inventarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $arrayTieneIva = [ 0 => 'NO', 1 => 'SI'];  
        $modelAreas = \yii\helpers\ArrayHelper::map(Area::find()->all(), 'id', 'nombre_area'); 

        if ($this->request->isPost && $model->load($this->request->post())) {
            $precos = $model->precos;
            $preven = $model->preven;
            $porcentaje = (1 - round(($precos / $preven), 2)) * 100;
            $model->porc_aut_venta = $porcentaje;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelAreas'=>$modelAreas,
            'arrayTieneIva'=>$arrayTieneIva,
        ]);
    }

    /**
     * Deletes an existing Inventarios model.
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
     * Finds the Inventarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Inventarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inventarios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
