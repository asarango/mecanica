<?php

namespace app\controllers;

use app\models\MenMenu;
use app\models\MenMenuSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenMenuController implements the CRUD actions for MenMenu model.
 */
class MenMenuController extends Controller
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
     * Lists all MenMenu models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $username = Yii::$app->user->identity->username;

        $menus = $this->get_menus_x_usuario($username);
        return $this->render('index',[
            'menus' => $menus
        ]);
    }

    private function get_menus_x_usuario($username){
        $con = Yii::$app->db;
        $query = "select 	m.nombre
                            ,o.id 
                            ,o.accion_yii 
                            ,m.icono 
                    from	usuario u 
                            inner join rol r on r.id = u.rol_id 
                            inner join men_rol_operacion ro on ro.rol_id = r.id 
                            inner join men_operacion o on o.id = ro.operacion_id 
                            inner join men_menu m on m.id = o.menu_id 
                    where 	u.username = '$username'
                            and m.es_activo = true
                            and o.accion_yii ilike '%index';";
        $res = $con->createCommand($query)->queryAll();
        return $res;
    }

    /**
     * Displays a single MenMenu model.
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
     * Creates a new MenMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MenMenu();

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
     * Updates an existing MenMenu model.
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
     * Deletes an existing MenMenu model.
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
     * Finds the MenMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MenMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MenMenu::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
