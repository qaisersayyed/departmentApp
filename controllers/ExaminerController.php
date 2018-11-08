<?php

namespace app\controllers;

use Yii;
use app\models\Examiner;
use app\models\SearchExaminer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ExaminerController implements the CRUD actions for Examiner model.
 */
class ExaminerController extends Controller
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
     * Lists all Examiner models.
     * @return mixed
     */
    public function actionIndex()
    {   if(!Yii::$app->user->isGuest){
            $searchModel = new SearchExaminer();
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
     * Displays a single Examiner model.
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
     * Creates a new Examiner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Examiner();
        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) ){
                $model->file = UploadedFile::getInstance($model, 'file');
                if ($model->file ) {                
                    $model->file->saveAs('uploads/examiner/' . $model->file ->baseName . '.' . $model->file ->extension);
                    $model->file= 'uploads/examiner/' . $model->file ->baseName . '.' . $model->file ->extension;
                }
                
	            $model->save();
                return $this->redirect(['view', 'id' => $model->examiner_id]);
                }

                return $this->render('create', [
                    'model' => $model,
                ]);
            }else{
                throw new \yii\web\ForbiddenHttpException;
            }
    }

    /**
     * Updates an existing Examiner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->examiner_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Examiner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Finds the Examiner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Examiner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Examiner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
