<?php

use app\models\AcademicYear;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ProgramStudent;
use app\models\Program;


use yii\data\ActiveDataProvider;

?>



<div class="row">
    <!-- <h1>Under Developement</h1> -->
    <div class="col-md-12 ">
        <?php $form = ActiveForm::begin([
            'method' => 'POST',
            'options' => ['enctype' => 'multipart/form-data']
        ]); ?>

        <div class="col-md-2">
            <br>

            <?= $form->field($modal, 'aid')->dropDownList(
                ArrayHelper::map(AcademicYear::find()->orderBy(['year' => SORT_DESC])->all(), 'academic_year_id', 'year')

            ) ?>

        </div>
        <div class="col-md-3">
            <br>
            <?= $form->field($modal, 'pid')->dropDownList(
                ArrayHelper::map(Program::find()->where(['user_id'=>Yii::$app->user->id])->all(), 'program_id', 'name')

            ) ?>

        </div>

        <br>

        <?= $form->field($modal, 'file')->fileInput(['accept' => '.csv']);
        echo "<br>$modal->file</br>" ?>


        <div class="col-md-2">
            <?= Html::submitButton('Import', ['class' => 'btn btn-success']) ?>

        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

<?php
// $conn = new mysqli("localhost", "root", "", "department");

// if (isset($_POST["import"])) {
//     echo $aid = Yii::$app->request->get('a_id');
//     echo $pid = Yii::$app->request->get('program_id');
//     $fileName = $_FILES["file"]["tmp_name"];

//     if ($_FILES["file"]["size"] > 0) {

//         $file = fopen($fileName, "r");

//         while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
//             $sql = "INSERT INTO `student` (`student_id`, `name`, `roll_no`, `phone_no`,`email`) VALUES (NULL,'$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
//             $sql1 = "INSERT INTO `program_student` (`program_student_id`, `program_id`, `student_id`, `created_at`, `updated_at`, `status`, `academic_year_id`) VALUES (NULL, (SELECT `program_id` FROM `program` WHERE `name` = '$emapData[1]'), (SELECT `student_id` FROM `student` WHERE `roll_no` = '$emapData[3]' ), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', (SELECT `academic_year_id` FROM `academic_year` WHERE `year` = '$emapData[6]' ))";
//             $mysqli->query($sql);
//             $mysqli->query($sql1);
//             $result = $mysqli->store_result();
//             if (!empty($result)) {
//                 $type = "success";
//                 $message = "CSV Data Imported into the Database";
//             } else {
//                 $type = "error";
//                 $message = "Problem in Importing CSV Data";
//             }
//             $mysqli->close();
//         }
//     }
// }
?>