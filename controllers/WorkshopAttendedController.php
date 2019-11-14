<?php

namespace app\controllers;

use Yii;
use app\models\WorkshopAttended;
use app\models\SearchWorkshopAttended;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * WorkshopAttendedController implements the CRUD actions for WorkshopAttended model.
 */
class WorkshopAttendedController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all WorkshopAttended models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new SearchWorkshopAttended();
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
     * Displays a single WorkshopAttended model.
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
     * Creates a new WorkshopAttended model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WorkshopAttended();
        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post())) {
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                
                if ($model->file1) {
                    $model->file1->saveAs('uploads/workshop-attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension);
                    $model->file1= 'uploads/workshop-attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                }
                if ($model->file2) {
                    $model->file2->saveAs('uploads/workshop-attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension);
                    $model->file2= 'uploads/workshop-attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                }
                if ($model->file3) {
                    $model->file3->saveAs('uploads/workshop-attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension);
                    $model->file3= 'uploads/workshop-attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                }
                if ($model->file4) {
                    $model->file4->saveAs('uploads/workshop-attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension);
                    $model->file4= 'uploads/workshop-attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->workshop_attended_id]);
            }

            return $this->render('create', [
                    'model' => $model,
                ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing WorkshopAttended model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = new WorkshopAttended();

        if(!!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) ){
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                
                if ($model->file1 ) {                
                    $model->file1->saveAs('uploads/workshop-attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension);
                    $model->file1= 'uploads/workshop-attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                }
                if ($model->file2 ) {                
                    $model->file2->saveAs('uploads/workshop-attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension);
                    $model->file2= 'uploads/workshop-attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                }
                if ($model->file3 ) {                
                    $model->file3->saveAs('uploads/workshop-attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension);
                    $model->file3= 'uploads/workshop-attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                }
                if ($model->file4) {                
                    $model->file4->saveAs('uploads/workshop-attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension);
                    $model->file4= 'uploads/workshop-attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                }
	            $model->save();
                return $this->redirect(['view', 'id' => $model->workshop_attended_id]);
                }

                return $this->render('create', [
                    'model' => $model,
                ]);
            }else{
                throw new \yii\web\ForbiddenHttpException;
            }
    }

    /**
     * Deletes an existing WorkshopAttended model.
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
     * Finds the WorkshopAttended model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WorkshopAttended the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WorkshopAttended::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
