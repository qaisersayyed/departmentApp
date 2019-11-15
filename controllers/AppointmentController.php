<?php

namespace app\controllers;

use Yii;
use app\models\Appointment;
use app\models\Faculty;
use app\models\SearchAppointment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppointmentController implements the CRUD actions for Appointment model.
 */
class AppointmentController extends Controller
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
     * Lists all Appointment models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $searchModel = new SearchAppointment();
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
     * Displays a single Appointment model.
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
     * Creates a new Appointment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!Yii::$app->user->isGuest) {
            $model = new Appointment();
            $faculty = new Faculty();


            if ($model->load(Yii::$app->request->post()) && $faculty->load(Yii::$app->request->post())) {
                $faculty->save();
                $model->faculty_id = $faculty->faculty_id;
                $model->save();
           

                return $this->redirect(['view', 'id' => $model->appointment_id]);
            }

            return $this->render('create', [
            'model' => $model,
            'faculty'=> $faculty,
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Appointment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->isGuest) {
            $model = $this->findModel($id);
            $faculty = Faculty::find()->where(['faculty_id'=>$model->faculty_id])->one();

            if ($model->load(Yii::$app->request->post()) && $faculty->load(Yii::$app->request->post())) {
                $model->save(false);
                $model->faculty_id = $faculty->faculty_id;
                $faculty->save(false);

                return $this->redirect(['view', 'id' => $model->appointment_id]);
            }

            return $this->render('update', [
            'model' => $model,
            'faculty' => $faculty,
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Appointment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
            $model =Appointment::findOne($id);
            $faculty = Faculty::find()->where(['faculty_id'=>$model->faculty_id])->one();
            $model->status = 0;
            $model->save(false);
            $faculty->status = 0;
            $faculty->save(false);

            return $this->redirect(['index']);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Finds the Appointment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appointment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appointment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
