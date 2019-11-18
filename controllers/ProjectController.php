<?php

namespace app\controllers;

use Yii;
use app\models\Project;
use app\models\SearchProject;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $searchModel = new SearchProject();
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
     * Displays a single Project model.
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
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();
        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post())) {
                $model->project_file = UploadedFile::getInstance($model, 'project_file');
                $model->project_file2 = UploadedFile::getInstance($model, 'project_file2');
                $model->project_file3 = UploadedFile::getInstance($model, 'project_file3');
                $model->project_file4 = UploadedFile::getInstance($model, 'project_file4');
                if ($model->project_file ) {       
                    $cnt = 1;
                    $filename =  'uploads/project/' . $model->project_file ->baseName . '.' . $model->project_file ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/project/' . $model->project_file ->baseName. $cnt . '.' . $model->project_file ->extension ; 
                        $cnt++;
                    }         
                    $model->project_file->saveAs($filename);
                    $model->project_file= $filename;
                }
                if ($model->project_file2 ) {                
                    $cnt = 1;
                    $filename =  'uploads/project/' . $model->project_file2 ->baseName . '.' . $model->project_file2 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/project/' . $model->project_file2 ->baseName. $cnt . '.' . $model->project_file2 ->extension ; 
                        $cnt++;
                    }         
                    $model->project_file2->saveAs($filename);
                    $model->project_file2= $filename;
                }
                if ($model->project_file3 ) {                
                    $cnt = 1;
                    $filename =  'uploads/project/' . $model->project_file3 ->baseName . '.' . $model->project_file3 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/project/' . $model->project_file3 ->baseName. $cnt . '.' . $model->project_file3 ->extension ; 
                        $cnt++;
                    }         
                    $model->project_file3->saveAs($filename);
                    $model->project_file3= $filename;
                }
                if ($model->project_file4) {                
                    $cnt = 1;
                    $filename =  'uploads/project/' . $model->project_file4 ->baseName . '.' . $model->project_file4 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/project/' . $model->project_file4 ->baseName. $cnt . '.' . $model->project_file4 ->extension ; 
                        $cnt++;
                    }         
                    $model->project_file4->saveAs($filename);
                    $model->project_file4= $filename;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->project_id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {

        if (!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);
            $old_data = $this->findModel($id);
            $model->project_file = UploadedFile::getInstance($model, 'project_file');
            $model->project_file2 = UploadedFile::getInstance($model, 'project_file2');
            $model->project_file3 = UploadedFile::getInstance($model, 'project_file3');
            $model->project_file4 = UploadedFile::getInstance($model, 'project_file4');
            if ($model->load(Yii::$app->request->post())) {


                if (!$model->project_file) {
                    $model->project_file = $old_data->project_file;
                } else {

                    $model->project_file->saveAs('uploads/project/' . $model->project_file->baseName . '.' . $model->project_file->extension);
                    $model->project_file = 'uploads/project/' . $model->project_file->baseName . '.' . $model->project_file->extension;
                }


                if (!$model->project_file2) {
                    $model->project_file2 = $old_data->project_file2;
                } else {

                    $model->project_file2->saveAs('uploads/project/' . $model->project_file2->baseName . '.' . $model->project_file2->extension);
                    $model->project_file2 = 'uploads/project/' . $model->project_file2->baseName . '.' . $model->project_file2->extension;
                }


                if (!$model->project_file3) {
                    $model->project_file3 = $old_data->project_file3;
                } else {

                    $model->project_file3->saveAs('uploads/project/' . $model->project_file3->baseName . '.' . $model->project_file3->extension);
                    $model->project_file3 = 'uploads/project/' . $model->project_file3->baseName . '.' . $model->project_file3->extension;
                }


                if (!$model->project_file4) {
                    $model->project_file4 = $old_data->project_file4;
                } else {

                    $model->project_file4->saveAs('uploads/project/' . $model->project_file4->baseName . '.' . $model->project_file4->extension);
                    $model->project_file4 = 'uploads/project/' . $model->project_file4->baseName . '.' . $model->project_file4->extension;
                }

                $model->save();
                return $this->redirect(['view', 'id' => $model->project_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Project model.
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
