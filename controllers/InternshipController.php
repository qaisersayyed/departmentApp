<?php

namespace app\controllers;


use Yii;
use app\models\Internship;
use app\models\SearchInternship;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InternshipController implements the CRUD actions for Internship model.
 */
class InternshipController extends Controller
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
     * Lists all Internship models.
     * @return mixed
     */
    public function actionIndex()
    {
    
    if(!Yii::$app->user->isGuest){
        $searchModel = new SearchInternship();
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
     * Displays a single Internship model.
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
     * Creates a new Internship model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Internship();

        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) ){
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file1 = UploadedFile::getInstance($model, 'file1');
            $model->file2 = UploadedFile::getInstance($model, 'file2');
            $model->file3 = UploadedFile::getInstance($model, 'file3');
                if ($model->file ) {                
                    $model->file->saveAs('uploads/internship/' . $model->file ->baseName . '.' . $model->file ->extension);
                    $model->file= 'uploads/internship/' . $model->file ->baseName . '.' . $model->file ->extension;
                }
                if ($model->file1 ) {                
                    $model->file1->saveAs('uploads/internship/' . $model->file1 ->baseName . '.' . $model->file1 ->extension);
                    $model->file1= 'uploads/internship/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                }
                if ($model->file2 ) {                
                    $model->file2->saveAs('uploads/internship/' . $model->file2 ->baseName . '.' . $model->file2 ->extension);
                    $model->file2= 'uploads/internship/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                }
                if ($model->file3 ) {                
                    $model->file3->saveAs('uploads/internship/' . $model->file3 ->baseName . '.' . $model->file3 ->extension);
                    $model->file3= 'uploads/internship/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                }
                
	            $model->save(false);
                return $this->redirect(['view', 'id' => $model->internship_id]);
            }

        return $this->render('create', [
            'model' => $model,
        ]);
    }}

    /**
     * Updates an existing Internship model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->internship_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Internship model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Internship model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Internship the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Internship::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
