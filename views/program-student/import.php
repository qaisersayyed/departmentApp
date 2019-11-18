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
    <h1>Under Developement</h1>
    <!-- <div class="col-md-12 ">
        <form Style="padding-right: 150px;" action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div class="col-md-2">
                <br>

                <?= Html::dropDownList(
                    'a_id',
                    null,
                    ArrayHelper::map(AcademicYear::find()->all(), 'academic_year_id', 'year'),
                    [
                        'class' => 'form-control', 'name' => 'a_id',
                        'prompt' => 'Select a year'
                    ]
                )
                ?>
            </div>
            <div class="col-md-3">
                <br>
                <?= Html::dropDownList(
                    'program_id',
                    null,
                    ArrayHelper::map(Program::find()->all(), 'program_id', 'name'),
                    [
                        'class' => 'form-control', 'name' => 'pid',
                        'prompt' => 'Select a program'
                    ]
                )
                ?>
            </div>

            <br>

            <input type="file" name="file" id="file" accept=".csv">


            <div class="col-md-3">
                <br>
                <button type="submit" id="submit" name="import" class="btn btn-success">Import</button>
            </div>

        </form>
    </div>
</div> -->

<?php
$conn = new mysqli("localhost", "root", "", "department");

if (isset($_POST["import"])) {
    echo $aid = Yii::$app->request->get('a_id');
    echo $pid = Yii::$app->request->get('program_id');
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sql = "INSERT INTO `student` (`student_id`, `name`, `roll_no`, `phone_no`,`email`) VALUES (NULL,'$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";
            $sql1 = "INSERT INTO `program_student` (`program_student_id`, `program_id`, `student_id`, `created_at`, `updated_at`, `status`, `academic_year_id`) VALUES (NULL, (SELECT `program_id` FROM `program` WHERE `name` = '$emapData[1]'), (SELECT `student_id` FROM `student` WHERE `roll_no` = '$emapData[3]' ), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', (SELECT `academic_year_id` FROM `academic_year` WHERE `year` = '$emapData[6]' ))";
            $mysqli->query($sql);
            $mysqli->query($sql1);
            $result = $mysqli->store_result();
            if (! empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
            $mysqli->close();
        }
    }
}
?>