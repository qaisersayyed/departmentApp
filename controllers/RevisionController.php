<?php

namespace app\controllers;

use Yii;
use app\models\Revision;
use app\models\searchRevision;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * RevisionController implements the CRUD actions for Revision model.
 */
class RevisionController extends Controller
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
     * Lists all Revision models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new searchRevision();
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
     * Displays a single Revision model.
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
        }
        else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Creates a new Revision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Revision();
        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) ){
                $model->syllabus_file = UploadedFile::getInstance($model, 'syllabus_file');
                $model->syllabus_file2 = UploadedFile::getInstance($model, 'syllabus_file2');
                $model->syllabus_file3 = UploadedFile::getInstance($model, 'syllabus_file3');
                $model->syllabus_file4 = UploadedFile::getInstance($model, 'syllabus_file4');
                if ($model->syllabus_file ) {                
                    $model->syllabus_file->saveAs('uploads/revision/' . $model->syllabus_file ->baseName . '.' . $model->syllabus_file ->extension);
                    $model->syllabus_file= 'uploads/revision/' . $model->syllabus_file ->baseName . '.' . $model->syllabus_file ->extension;
                }
                if ($model->syllabus_file2 ) {                
                    $model->syllabus_file2->saveAs('uploads/revision/' . $model->syllabus_file2 ->baseName . '.' . $model->syllabus_file2 ->extension);
                    $model->syllabus_file2= 'uploads/revision/' . $model->syllabus_file2 ->baseName . '.' . $model->syllabus_file2 ->extension;
                }
                if ($model->syllabus_file3 ) {                
                    $model->syllabus_file3->saveAs('uploads/revision/' . $model->syllabus_file3 ->baseName . '.' . $model->syllabus_file3 ->extension);
                    $model->syllabus_file3= 'uploads/revision/' . $model->syllabus_file3 ->baseName . '.' . $model->syllabus_file3 ->extension;
                }
                if ($model->syllabus_file4 ) {                
                    $model->syllabus_file4->saveAs('uploads/revision/' . $model->syllabus_file4 ->baseName . '.' . $model->syllabus_file4 ->extension);
                    $model->syllabus_file4= 'uploads/revision/' . $model->syllabus_file4 ->baseName . '.' . $model->syllabus_file4 ->extension;
                }
                
	            $model->save();
                return $this->redirect(['view', 'id' => $model->revision_id]);
                }

                return $this->render('create', [
                    'model' => $model,
                ]);
            }else{
                throw new \yii\web\ForbiddenHttpException;
            }
    }

    /**
     * Updates an existing Revision model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(!Yii::$app->user->isGuest){
            if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
                return $this->redirect(['view', 'id' => $model->revision_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;   
        }
    }

    /**
     * Deletes an existing Revision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest){
            $model =Revision::findOne($id);
            $model->status = 0;
            $model->save(false);
            return $this->redirect(['index']);
        }else{
            throw new \yii\web\ForbiddenHttpException; 
        }
    }

    /**
     * Finds the Revision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Revision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Revision::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
