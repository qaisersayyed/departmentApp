<?php

namespace app\controllers;

use Yii;
use app\models\ProgramStudent;
use app\models\SearchProgramStudent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Student;
use yii\widgets\ActiveForm;
use yii\helpers\Json;
use yii\web\Response;

/**
 * ProgramStudentController implements the CRUD actions for ProgramStudent model.
 */
class ProgramStudentController extends Controller
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

    public function actionGetStudent($id)
    {
        if (!Yii::$app->user->isGuest) {
            $student = ProgramStudent::find()->joinWith('student')->where(['program_id' => $id])->all();
            $studentArray = array();
            foreach ($student as $s) {
                $tmp = array();
                array_push($tmp, $s->student_id);
                array_push($tmp, $s->student->name);
                array_push($studentArray, $tmp);
            }
            return Json::encode($studentArray);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }
    /**
     * Lists all ProgramStudent models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $searchModel = new SearchProgramStudent();
            if (Yii::$app->request->get('roll_no')) {
                $searchModel->roll_no = Yii::$app->request->get('roll_no');
            }
            if (Yii::$app->request->get('a_status')) {
                $searchModel->alumni = Yii::$app->request->get('a_status');
                if (Yii::$app->request->get('a_status') == 1) {
                    $searchModel->alumni = 1;
                } else {
                    $searchModel->alumni = 2;
                }
                // echo Yii::$app->request->get('a_status');
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
     * Displays a single ProgramStudent model.
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
     * Creates a new ProgramStudent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProgramStudent();
        $student = new Student();
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->request->isAjax && $student->load(Yii::$app->request>post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($student);
            }
            if ($model->load(Yii::$app->request->post()) && $student->load(Yii::$app->request->post())) {
                $student->save(false);
                $model->student_id = $student->student_id;
                $model->save();
           
         
                return $this->redirect(['view', 'id' => $model->program_student_id]);
            }

            return $this->render('create', [
            'model' => $model,
            'student' => $student,
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing ProgramStudent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $student = Student::find()->where(['student_id'=>$model->student_id])->one();
        // $student = $this->findModel($id);
       
        
        if (!Yii::$app->user->isGuest) {
            if ($model->load(Yii::$app->request->post()) && $student->load(Yii::$app->request->post())) {
                $student->save(false);
                $model->student_id = $student->student_id;
                $model->save(false);
            
            
                return $this->redirect(['view', 'id' => $model->program_student_id]);
            }

            return $this->render('update', [
            'model' => $model,
            'student' => $student,
        ]);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing ProgramStudent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!Yii::$app->user->isGuest) {
            $model=programstudent::findone($id);
            $model1=student::findone($model->student_id);
            $model1->status = 0;
            $model->status = 0;
            $model1->save(false);
            $model->save(false);

            return $this->redirect(['index']);
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Finds the ProgramStudent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProgramStudent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProgramStudent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
