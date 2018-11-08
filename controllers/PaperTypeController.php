<?php

namespace app\controllers;

use Yii;
use app\models\PaperType;
use app\models\Paper;
use app\models\SearchPaperType;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaperTypeController implements the CRUD actions for PaperType model.
 */
class PaperTypeController extends Controller
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
     * Lists all PaperType models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new SearchPaperType();
            if(Yii::$app->request->get('from') && Yii::$app->request->get('to')){
                $searchModel->to = Yii::$app->request->get('to');
                $searchModel->from = Yii::$app->request->get('from');
            }
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
        
    }

    /**
     * Displays a single PaperType model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }    
    }

    /**
     * Creates a new PaperType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaperType();
        $paper = new Paper();
        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) && $paper->load(Yii::$app->request->post())){
                $paper->save(false) ;
                $model->paper_id =  $paper->paper_id;
            
                $model->save(false) ;
                
               
                return $this->redirect(['view', 'id' => $model->paper_type_id]);
            }

            return $this->render('create', [
                'model' => $model,
                'paper' => $paper,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        } 
    }

    /**
     * Updates an existing PaperType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $paper = Paper::find()->where(['paper_id'=>$model->paper_id])->one();

        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) && $paper->load(Yii::$app->request->post())) {
                $model->save(false);
                $model->paper_id = $paper->paper_id;
                $paper->save(false);

                return $this->redirect(['view', 'id' => $model->paper_type_id]);
            }

            return $this->render('update', [
                'model' => $model,
                'paper' => $paper,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;   
        }
    }

    /**
     * Deletes an existing PaperType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest){
            $model =PaperType::findOne($id);
            $model->status = 0;
            $model->save(false);
            return $this->redirect(['index']);
        }else{
            throw new \yii\web\ForbiddenHttpException; 
        }
    }

    /**
     * Finds the PaperType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaperType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaperType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
