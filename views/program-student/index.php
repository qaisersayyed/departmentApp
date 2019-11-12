<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProgramStudent */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-student-index">
    <form Style="padding-right: 150px;" action="" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
        <div class="col-md-3">
            <label>Choose Excel File</label><br> <input type="file" name="file" id="file">
            <br>
        </div>
        <div class="col-md-3">
            <br>
            <button type="submit" id="submit" name="import" class="btn btn-success">Import</button>
        </div>

    </form>

    <h1><a Style="float:right" href="index.php?r=student-organization/create" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Add Alumni Details</a></h1>

    <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=program-student/create" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Add Student</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>


    <?php $form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
    <div class="row">
        <div class="col-md-2">
            <br>
            <input type="text" name='roll_no' class='form-control' placeholder="Search Roll No.">
        </div>

        <div class="col-md-2">
            <br>
            <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>

        </div>

    </div>
    <?php ActiveForm::end(); ?>
    <div class="text-right">
        <p><b>Search Result: </b>
            <?php
            if ($searchModel->roll_no != "") {
                echo $searchModel->roll_no;
            } else {
                echo "None";
            }
            ?>
        </p>
    </div>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat' => true,
        'export' => [
            'label' => 'Export',
            'fontAwesome' => true,
            'showConfirmAlert' => false,
            'target' => GridView::TARGET_BLANK
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'program_student_id',
            [
                'label' => 'Program Name',
                'value' => 'program.name',
                'attribute' => 'program_id',
            ],
            [
                'label' => 'Student Name',
                'value' => 'student.name',
                'attribute' => 'student_id',
            ],
            // 'created_at',
            // 'updated_at',
            // 'status',
            [
                'label' => 'Roll No.',
                'value' => 'student.roll_no',
                'attribute' => 'roll_no',
            ],

            'student.phone_no',
            'student.email',
            [
                'label' => 'Admission Year',
                'value' => 'academicYear.year',
                'attribute' => 'academic_year_id',
            ],


            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax' => true,
        'showPageSummary' => false,
        'panel' => [

            'heading' => $this->title,

        ]
    ]); ?>

    <?php

    $mysqli = new mysqli("localhost", "root", "", "department");
    if (isset($_POST["import"])) {


        echo $filename = $_FILES["file"]["tmp_name"];


        if ($_FILES["file"]["size"] > 0) {

            $file = fopen($filename, "r");

            $flag = true;
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
                if ($flag) {
                    $flag = false;
                    continue;
                }
                $sql = "INSERT INTO `student` (`student_id`, `name`, `roll_no`, `phone_no`,`email`) VALUES (NULL,'$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]')";

                $sql1 = "INSERT INTO `program_student` (`program_student_id`, `program_id`, `student_id`, `created_at`, `updated_at`, `status`, `academic_year_id`) VALUES (NULL, (SELECT `program_id` FROM `program` WHERE `name` = '$emapData[1]'), (SELECT `student_id` FROM `student` WHERE `roll_no` = '$emapData[3]' ), CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '1', (SELECT `academic_year_id` FROM `academic_year` WHERE `year` = '$emapData[6]' ))";
                $mysqli->query($sql);
                $mysqli->query($sql1);
                $result=$mysqli->store_result();
                if (!empty($result)) {
                    echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location.replace('index.php?r=program-student');
                    </script>";
                }
            }
            fclose($file);
            echo "<script type=\"text/javascript\">
                            alert(\"CSV File has been successfully Imported.\");
                            window.location.replace('index.php?r=program-student');
    					</script>";


            $mysqli->close();
        }
    }
    ?>


</div>