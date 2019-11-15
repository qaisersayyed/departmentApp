<?php

namespace app\controllers;

use Yii;
use app\models\PaperPresented;
use app\models\SearchPaperPresented;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PaperPresentedController implements the CRUD actions for PaperPresented model.
 */
class PaperPresentedController extends Controller
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
     * Lists all PaperPresented models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new SearchPaperPresented();
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
     * Displays a single PaperPresented model.
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
     * Creates a new PaperPresented model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaperPresented();
        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) ){
            $model->paper_presented_file = UploadedFile::getInstance($model, 'paper_presented_file');
            $model->paper_presented_file2 = UploadedFile::getInstance($model, 'paper_presented_file2');
            $model->paper_presented_file3 = UploadedFile::getInstance($model, 'paper_presented_file3');
            $model->paper_presented_file4 = UploadedFile::getInstance($model, 'paper_presented_file4');
            if ($model->paper_presented_file ) {       
                $cnt = 1;
                $filename =  'uploads/paper-presented/' . $model->paper_presented_file ->baseName . '.' . $model->paper_presented_file ->extension;
                while (file_exists($filename)) {
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file ->baseName. $cnt . '.' . $model->paper_presented_file ->extension ; 
                    $cnt++;
                }         
                $model->paper_presented_file->saveAs($filename);
                $model->paper_presented_file= $filename;
            }
            if ($model->paper_presented_file2 ) {                
                $cnt = 1;
                $filename =  'uploads/paper-presented/' . $model->paper_presented_file2 ->baseName . '.' . $model->paper_presented_file2 ->extension;
                while (file_exists($filename)) {
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file2 ->baseName. $cnt . '.' . $model->paper_presented_file2 ->extension ; 
                    $cnt++;
                }         
                $model->paper_presented_file2->saveAs($filename);
                $model->paper_presented_file2= $filename;
            }
            if ($model->paper_presented_file3 ) {                
                $cnt = 1;
                $filename =  'uploads/paper-presented/' . $model->paper_presented_file3 ->baseName . '.' . $model->paper_presented_file3 ->extension;
                while (file_exists($filename)) {
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file3 ->baseName. $cnt . '.' . $model->paper_presented_file3 ->extension ; 
                    $cnt++;
                }         
                $model->paper_presented_file3->saveAs($filename);
                $model->paper_presented_file3= $filename;
            }
            if ($model->paper_presented_file4) {                
                $cnt = 1;
                $filename =  'uploads/paper-presented/' . $model->paper_presented_file4 ->baseName . '.' . $model->paper_presented_file4 ->extension;
                while (file_exists($filename)) {
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file4 ->baseName. $cnt . '.' . $model->paper_presented_file4 ->extension ; 
                    $cnt++;
                }         
                $model->paper_presented_file4->saveAs($filename);
                $model->paper_presented_file4= $filename;
            }
	            $model->save(false);
                return $this->redirect(['view', 'id' => $model->paper_presented_id]);
            }

        return $this->render('create', [
            'model' => $model,
        ]);
    }else{
        throw new \yii\web\ForbiddenHttpException;
    }
    }

    /**
     * Updates an existing PaperPresented model.
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
                $model->paper_presented_file = UploadedFile::getInstance($model, 'paper_presented_file');
                
                if (!$model->paper_presented_file ){
                    $model->paper_presented_file = $old_data->paper_presented_file;
                    
                }else{
                    $cnt = 1;
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file ->baseName . '.' . $model->paper_presented_file ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-presented/' . $model->paper_presented_file ->baseName. $cnt . '.' . $model->paper_presented_file ->extension ; 
                        $cnt++;
                    }         
                    $model->paper_presented_file->saveAs($filename);
                    $model->paper_presented_file= $filename;
                }
                $model->paper_presented_file2 = UploadedFile::getInstance($model, 'paper_presented_file2');
                if (!$model->paper_presented_file2){
                    $model->paper_presented_file2 = $old_data->paper_presented_file2;
    
                }else{
                    $cnt = 1;
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file2 ->baseName . '.' . $model->paper_presented_file2 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-presented/' . $model->paper_presented_file2 ->baseName. $cnt . '.' . $model->paper_presented_file2 ->extension ; 
                        $cnt++;
                    }         
                    $model->paper_presented_file2->saveAs($filename);
                    $model->paper_presented_file2= $filename;
                }
                $model->paper_presented_file3 = UploadedFile::getInstance($model, 'paper_presented_file3');
                if (!$model->paper_presented_file3){
                    $model->paper_presented_file3 = $old_data->paper_presented_file3;
    
                }else{
                    $cnt = 1;
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file3 ->baseName . '.' . $model->paper_presented_file3 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-presented/' . $model->paper_presented_file3 ->baseName. $cnt . '.' . $model->paper_presented_file3 ->extension ; 
                        $cnt++;
                    }         
                    $model->paper_presented_file3->saveAs($filename);
                    $model->paper_presented_file3= $filename;
                }
                $model->paper_presented_file4 = UploadedFile::getInstance($model, 'paper_presented_file4');
                
                if (!$model->paper_presented_file4){
                    $model->paper_presented_file4 = $old_data->paper_presented_file4;
                }else{
                    
                    $cnt = 1;
                    $filename =  'uploads/paper-presented/' . $model->paper_presented_file4 ->baseName . '.' . $model->paper_presented_file4 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/paper-presented/' . $model->paper_presented_file4 ->baseName. $cnt . '.' . $model->paper_presented_file4 ->extension ; 
                        $cnt++;
                    }         
                    $model->paper_presented_file4->saveAs($filename);
                    $model->paper_presented_file4= $filename;
                }
                $model->save(false);
                
                return $this->redirect(['view', 'id' => $model->paper_presented_id]);
            }
    
            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }
    /**
     * Deletes an existing PaperPresented model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest){
            $model =PaperPresented::findOne($id);
            $model->status = 0;
            $model->save(false);
            return $this->redirect(['index']);
        }else{
            throw new \yii\web\ForbiddenHttpException; 
        }
       
    }

    /**
     * Finds the PaperPresented model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaperPresented the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaperPresented::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
