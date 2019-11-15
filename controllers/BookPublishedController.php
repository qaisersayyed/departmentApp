<?php

namespace app\controllers;

use Yii;
use app\models\BookPublished;
use app\models\SearchBookPublished;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BookPublishedController implements the CRUD actions for BookPublished model.
 */
class BookPublishedController extends Controller
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
     * Lists all BookPublished models.
     * @return mixed
     */
    public function actionIndex()
    {   
        if(!Yii::$app->user->isGuest){
            $searchModel = new SearchBookPublished();
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
     * Displays a single BookPublished model.
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
     * Creates a new BookPublished model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BookPublished();

        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) ){
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                
                if ($model->file1 ) {                
                    $model->file1->saveAs('uploads/book-published/' . $model->file1 ->baseName . '.' . $model->file1 ->extension);
                    $model->file1= 'uploads/book-published/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                }
                if ($model->file2 ) {                
                    $model->file2->saveAs('uploads/book-published/' . $model->file2 ->baseName . '.' . $model->file2 ->extension);
                    $model->file2= 'uploads/book-published/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                }
                if ($model->file3 ) {                
                    $model->file3->saveAs('uploads/book-published/' . $model->file3 ->baseName . '.' . $model->file3 ->extension);
                    $model->file3= 'uploads/book-published/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                }
                if ($model->file4) {                
                    $model->file4->saveAs('uploads/book-published/' . $model->file4 ->baseName . '.' . $model->file4 ->extension);
                    $model->file4= 'uploads/book-published/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                }
	            $model->save();
                return $this->redirect(['view', 'id' => $model->book_published_id]);
                }

                return $this->render('create', [
                    'model' => $model,
                ]);
            }else{
                throw new \yii\web\ForbiddenHttpException;
            }
    }

    /**
     * Updates an existing BookPublished model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->isGuest){
            $model = $this->findModel($id);
            $old_data= $this->findModel($id);
    
            if ($model->load(Yii::$app->request->post())) {
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                
                if (!$model->file1 ){
                    $model->file1 = $old_data->file1;
                    
                }else{
                    
                    $model->file1->saveAs('uploads/book-published/' . $model->file1 ->baseName . '.' . $model->file1 ->extension);
                    $model->file1= 'uploads/book-published/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                }
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                if (!$model->file2){
                    $model->file2 = $old_data->file2;
    
                }else{
                    
                    $model->file2->saveAs('uploads/book-published/' . $model->file2 ->baseName . '.' . $model->file2 ->extension);
                    $model->file2= 'uploads/book-published/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                }
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                if (!$model->file3){
                    $model->file3 = $old_data->file3;
    
                }else{
                    $model->file3->saveAs('uploads/book-published/' . $model->file3 ->baseName . '.' . $model->file3 ->extension);
                    $model->file3= 'uploads/book-published/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                }
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                
                if (!$model->file4){
                    $model->file4 = $old_data->file4;
                }else{
                    
                    $model->file4->saveAs('uploads/book-published/' . $model->file4 ->baseName . '.' . $model->file4 ->extension);
                    $model->file4= 'uploads/book-published/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                }
                $model->save(false);
                
                return $this->redirect(['view', 'id' => $model->book_published_id]);
            }
    
            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
        throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing BookPublished model.
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
     * Finds the BookPublished model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookPublished the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookPublished::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
