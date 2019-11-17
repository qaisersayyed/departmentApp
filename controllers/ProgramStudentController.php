<?php

namespace app\controllers;

use Yii;
use yii\db;
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
    public function actionAttendance()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->request->get('a_id')) {
                $aid = Yii::$app->request->get('a_id');
                $pid = Yii::$app->request->get('program_id');
                $sem = Yii::$app->request->get('sem');
                $course = Yii::$app->request->get('course');
                $instructor = Yii::$app->request->get('instructor');
                $students = ProgramStudent::find()
                    ->joinWith('student')
                    ->where(['academic_year_id' => $aid])
                    ->andWhere(['student.status' => 1])
                    ->andWhere(['program_id' => $pid])
                    ->all();
                return $this->render('attendance', [
                    'students' => $students,
                    'aid' => $aid,
                    'pid' => $pid,
                    'instructor' => $instructor,
                    'sem' => $sem,
                    'course' => $course,
                ]);
            } else {
                return $this->render('attendance');
            }
        } else {
            throw new \yii\web\ForbiddenHttpException;
        }
    }

    public function actionImport()
    {
        if (!Yii::$app->user->isGuest) {

            if (!Yii::$app->user->isGuest) {
                if (Yii::$app->request->get('a_id')) {

                    echo $aid = Yii::$app->request->get('a_id');
                    echo $pid = Yii::$app->request->get('program_id');
                    echo $file = Yii::$app->request->get('file');


                    // return $this->render('import', [
                    //     'aid' => $aid,
                    //     'pid' => $pid,
                    //     'file' => $file,
                    // ]);
                    
                    //echo $filename = $_FILES['file']['tmp_name'];
                    $filename =  'uploads/paper-published/' .$file ;
                    //$mysqli = new mysqli("localhost", "root", "", "department");
                    if (!empty($file)) {
                        $file1 = fopen($filename, "r");

                        $flag = true;
                        while (($emapData = fgetcsv($file1, 10000, ",")) !== false) {
                            if ($flag) {
                                $flag = false;
                                continue;
                            }
                            $sql = "INSERT INTO `student` (`student_id`, `name`, `roll_no`, `phone_no`,`email`) VALUES (NULL,'$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
                            $sql1 = "INSERT INTO `program_student` (`program_student_id`, `program_id`, `student_id`, `created_at`, `updated_at`, `status`, `academic_year_id`) VALUES (NULL, (SELECT `program_id` FROM `program` WHERE `name` = '$emapData[1]'), (SELECT `student_id` FROM `student` WHERE `roll_no` = '$emapData[3]' ), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', (SELECT `academic_year_id` FROM `academic_year` WHERE `year` = '$emapData[6]' ))";
                            // $mysqli->query($sql);
                            // $mysqli->query($sql1);
                            // $result = $mysqli->store_result();
                            Yii::$app->db->createCommand($sql)->execute();
                            Yii::$app->db->createCommand($sql1)->execute();
                            // if (!empty($result)) {
                            //     echo "<script type=\"text/javascript\">
                            //             alert(\"Invalid File:Please Upload CSV File.\");
                            //             window.location.replace('index.php?r=program-student');
                            //         </script>";
                            // }
                        }
                        fclose($file);
                        echo "<script type=\"text/javascript\">
                                                alert(\"CSV File has been successfully Imported.\");
                                                window.location.replace('index.php?r=program-student');
                                            </script>";


                        
                    }
                } else {
                    return $this->render('import');
                }
            } else {
                throw new \yii\web\ForbiddenHttpException;
            }
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
            if (Yii::$app->request->isAjax && $student->load(Yii::$app->request > post())) {
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
        $student = Student::find()->where(['student_id' => $model->student_id])->one();
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
            $model = programstudent::findone($id);
            $model1 = student::findone($model->student_id);
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
