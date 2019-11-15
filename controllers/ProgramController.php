<?php

namespace app\controllers;

use Yii;
use app\models\Program;
use app\models\SearchProgram;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProgramController implements the CRUD actions for Program model.
 */
class ProgramController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }



    
    /**
     * Lists all Program models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $searchModel = new SearchProgram();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Displays a single Program model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Creates a new Program model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Program();

        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post())) {
                $model->department_id = yii::$app->user->identity->department_name;
                $model->save();
            
                return $this->redirect(['view', 'id' => $model->program_id]);
            }
        
            return $this->render('create', [
            'model' => $model,
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Program model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return $this->redirect(['view', 'id' => $model->program_id]);
            }

            return $this->render('update', [
            'model' => $model,
            
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Program model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
            $model= program::findone($id);
            $model->status = 0;
            $model->save(false);

            return $this->redirect(['index']);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Finds the Program model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Program the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Program::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
