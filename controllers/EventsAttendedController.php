<?php

namespace app\controllers;

use Yii;
use app\models\EventsAttended;
use app\models\SearchEventsAttended;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EventsAttendedController implements the CRUD actions for EventsAttended model.
 */
class EventsAttendedController extends Controller
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
     * Lists all EventsAttended models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchEventsAttended();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EventsAttended model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EventsAttended model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EventsAttended();

        $model->user_id = Yii::$app->user->id;

        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post())) {
                $model->file1 = UploadedFile::getInstance($model, 'file1');
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file4 = UploadedFile::getInstance($model, 'file4');
                if ($model->file1) {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file1 ->baseName. $cnt . '.' . $model->file1 ->extension ;
                        $cnt++;
                    }
                    $model->file1->saveAs($filename);
                    $model->file1= $filename;
                }
                  
               

                if ($model->file2) {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file2 ->baseName. $cnt . '.' . $model->file2 ->extension ;
                        $cnt++;
                    }
                    $model->file2->saveAs($filename);
                    $model->file2= $filename;
                }
                if ($model->file3) {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file3 ->baseName. $cnt . '.' . $model->file3 ->extension ;
                        $cnt++;
                    }
                    $model->file3->saveAs($filename);
                    $model->file3= $filename;
                }

                if ($model->file4) {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file4 ->baseName. $cnt . '.' . $model->file4 ->extension ;
                        $cnt++;
                    }
                    $model->file4->saveAs($filename);
                    $model->file4= $filename;
                }

                $model->save(false);
                return $this->redirect(['view', 'id' => $model->event_attended_id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EventsAttended model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_data = $this->findModel($id);

        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post())) {
                $model->file1 = UploadedFile::getInstance($model, 'file1');

                if (!$model->file1) {
                    $model->file1 = $old_data->file1;
                } else {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file1 ->baseName. $cnt . '.' . $model->file1 ->extension ;
                        $cnt++;
                    }
                    $model->file1->saveAs($filename);
                    $model->file1= $filename;
                }

                $model->file2 = UploadedFile::getInstance($model, 'file2');
                if (!$model->file2) {
                    $model->file2 = $old_data->file2;
                } else {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file2 ->baseName. $cnt . '.' . $model->file2 ->extension ;
                        $cnt++;
                    }
                    $model->file2->saveAs($filename);
                    $model->file2= $filename;
                }

                $model->file3 = UploadedFile::getInstance($model, 'file3');
                if (!$model->file3) {
                    $model->file3 = $old_data->file3;
                } else {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file3 ->baseName. $cnt . '.' . $model->file3 ->extension ;
                        $cnt++;
                    }
                    $model->file3->saveAs($filename);
                    $model->file3= $filename;
                }

                $model->file4 = UploadedFile::getInstance($model, 'file4');
                if (!$model->file4) {
                    $model->file4 = $old_data->file4;
                } else {
                    $cnt = 1;
                    $filename =  'uploads/events_attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
                    while (file_exists($filename)) {
                        $filename =  'uploads/events_attended/' . $model->file4 ->baseName. $cnt . '.' . $model->file4 ->extension ;
                        $cnt++;
                    }
                    $model->file4->saveAs($filename);
                    $model->file4= $filename;
                }
            
                $model->save();
                return $this->redirect(['view', 'id' => $model->event_attended_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EventsAttended model.
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
     * Finds the EventsAttended model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EventsAttended the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EventsAttended::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
