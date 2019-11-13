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
                    $model->file1->saveAs('uploads/events_attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension);
                    $model->file1= 'uploads/events_attended/' . $model->file1 ->baseName . '.' . $model->file1 ->extension;
                }
                if ($model->file2) {
                    $model->file2->saveAs('uploads/events_attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension);
                    $model->file2= 'uploads/events_attended/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                }
                if ($model->file3) {
                    $model->file3->saveAs('uploads/events_attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension);
                    $model->file3= 'uploads/events_attended/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                }
                if ($model->file4) {
                    $model->file4->saveAs('uploads/events_attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension);
                    $model->file4= 'uploads/events_attended/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
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
                $model->file1 = UploadedFile::getInstance($model, 'paper_presented_file');

                if (!$model->file1) {
                    $model->file1 = $old_data->file1;
                } else {
                    $model->file1->saveAs('uploads/paper-presented/' . $model->file1 ->baseName . '.' . $model->file1 ->extension);
                    $model->file1= 'uploads/paper-presented/' . $model->file1 ->baseName . '.' . $model->file1->extension;
                }

                $model->file2 = UploadedFile::getInstance($model, 'paper_presented_file2');
                if (!$model->file2) {
                    $model->file2 = $old_data->file2;
                } else {
                    $model->file2->saveAs('uploads/paper-presented/' . $model->file2 ->baseName . '.' . $model->file2 ->extension);
                    $model->file2= 'uploads/paper-presented/' . $model->file2 ->baseName . '.' . $model->file2 ->extension;
                }

                $model->file3 = UploadedFile::getInstance($model, 'file3');
                if (!$model->file3) {
                    $model->file3 = $old_data->file3;
                } else {
                    $model->file3->saveAs('uploads/paper-presented/' . $model->file3 ->baseName . '.' . $model->file3 ->extension);
                    $model->file3= 'uploads/paper-presented/' . $model->file3 ->baseName . '.' . $model->file3 ->extension;
                }

                $model->file4 = UploadedFile::getInstance($model, 'file4');
                if (!$model->file4) {
                    $model->file4 = $old_data->file4;
                } else {
                    $model->file4->saveAs('uploads/paper-presented/' . $model->file4 ->baseName . '.' . $model->file4 ->extension);
                    $model->file4= 'uploads/paper-presented/' . $model->file4 ->baseName . '.' . $model->file4 ->extension;
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
