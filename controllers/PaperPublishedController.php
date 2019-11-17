<?php

namespace app\controllers;

use Yii;
use app\models\PaperPublished;
use app\models\SearchPaperPublished;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PaperPublishedController implements the CRUD actions for PaperPublished model.
 */
class PaperPublishedController extends Controller
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
     * Lists all PaperPublished models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $searchModel = new SearchPaperPublished();
            if (Yii::$app->request->get('from') && Yii::$app->request->get('to')) {
                $searchModel->to = Yii::$app->request->get('to');
                $searchModel->from = Yii::$app->request->get('from');
            }
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
     * Displays a single PaperPublished model.
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
     * Creates a new PaperPublished model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaperPublished();
        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post())) {
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                
                if ($model->file1 ) {       
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file1 ->baseName. $cnt . '.' . $model->file1 ->extension ; 
                        $cnt++;
                    }         
                    $model->file1->saveAs($filename);
                    $model->file1= $filename;
                }
                if ($model->file2 ) {                
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file2 ->baseName. $cnt . '.' . $model->file2 ->extension ; 
                        $cnt++;
                    }         
                    $model->file2->saveAs($filename);
                    $model->file2= $filename;
                }
                if ($model->file3 ) {                
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file3 ->baseName. $cnt . '.' . $model->file3 ->extension ; 
                        $cnt++;
                    }         
                    $model->file3->saveAs($filename);
                    $model->file3= $filename;
                }
                if ($model->file4) {                
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file4 ->baseName. $cnt . '.' . $model->file4 ->extension ; 
                        $cnt++;
                    }         
                    $model->file4->saveAs($filename);
                    $model->file4= $filename;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->paper_published_id]);
            }
            //     $model->user_id = Yii::$app->user->id;
            return $this->render('create', [
                    'model' => $model,
                ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing PaperPublished model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);
            $old_data= $this->findModel($id);
    
            if ($model->load(Yii::$app->request->post())) {
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                
                if (!$model->file1) {
                    $model->file1 = $old_data->file1;
                    
                }else{
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file1 ->baseName. $cnt . '.' . $model->file1 ->extension ; 
                        $cnt++;
                    }         
                    $model->file1->saveAs($filename);
                    $model->file1= $filename;
                }
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                if (!$model->file2) {
                    $model->file2 = $old_data->file2;
    
                }else{
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file2 ->baseName. $cnt . '.' . $model->file2 ->extension ; 
                        $cnt++;
                    }         
                    $model->file2->saveAs($filename);
                    $model->file2= $filename;
                }
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                if (!$model->file3) {
                    $model->file3 = $old_data->file3;
    
                }else{
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file3 ->baseName. $cnt . '.' . $model->file3 ->extension ; 
                        $cnt++;
                    }         
                    $model->file3->saveAs($filename);
                    $model->file3= $filename;
                }
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                
                if (!$model->file4) {
                    $model->file4 = $old_data->file4;
                }else{
                    
                    $cnt = 1;
                    $filename =  'uploads/paper-published/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-published/' . $model->file4 ->baseName. $cnt . '.' . $model->file4 ->extension ; 
                        $cnt++;
                    }         
                    $model->file4->saveAs($filename);
                    $model->file4= $filename;
                }
                $model->save(false);
                
                return $this->redirect(['view', 'id' => $model->paper_published_id]);
            }
    
            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing PaperPublished model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Finds the PaperPublished model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaperPublished the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaperPublished::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
