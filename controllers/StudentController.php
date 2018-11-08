<?php

namespace app\controllers;

use Yii;

use app\models\ProgramStudent;
use app\models\Student;
use app\models\SearchStudent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(!Yii::$app->user->isGuest){
            $searchModel = new SearchStudent();
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
     * Displays a single Student model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(!Yii::$app->user->isGuest){
        $model = ProgramStudent::find()->where(['student_id' => $id])->all();
        return $this->render('view', [
            'model' => $model,
        ]);
        }else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    public function actionAlumni()
    {
        if(!Yii::$app->user->isGuest){
            /* $searchModel = new SearchStudent();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams); */
            $students = null;
            $aid = null;
            if(Yii::$app->request->get('a_id')){
                $aid = Yii::$app->request->get('a_id');
                $students = ProgramStudent::find()
                                    ->joinWith('student')
                                    ->where(['academic_year_id' => $aid])
                                    ->andWhere(['student.alumni' => 0])
                                    ->andWhere(['student.status' => 1])
                                    ->all();
            }
            if(Yii::$app->request->get('aid')){  
                $aid = Yii::$app->request->get('aid');
                $students = ProgramStudent::find()
                                    ->joinWith('student')
                                    ->where(['academic_year_id' => $aid])
                                    ->andWhere(['student.alumni' => 0])
                                    ->andWhere(['student.status' => 1])
                                    ->all();
                foreach($students as $student){
                    $student_roll = Yii::$app->request->get($student->student->roll_no);
                    if($student_roll){
                        $s = Student::find()->where(['roll_no' => $student->student->roll_no])->one();
                        $s->alumni = 1;
                        $s->save(false);
                    }
                }
            }
            return $this->render('alumni', [
                'students' => $students,
                'aid' => $aid,
            ]);
        }else{
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();
        $admission = new ProgramStudent();
        if(!Yii::$app->user->isGuest){

        if ($model->load(Yii::$app->request->post()) && $admission->load(Yii::$app->request->post())) {
            $model->save();
            $admission->student_id = $model->student_id;
            $admission->save(false);
            return $this->redirect(['view', 'id' => $model->student_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'admission' => $admission,
        ]);
        }else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing Student model.
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
            return $this->redirect(['view', 'id' => $model->student_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
        }else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->isGuest){
            $model =student::findOne($id);
            $model->status = 0;
            $model->save(false);

        return $this->redirect(['index']);
        }else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
