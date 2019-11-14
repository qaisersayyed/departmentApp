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

<?php $form = ActiveForm::begin([
    'method' => 'GET',
]); ?>

    <div class="row">
        <div class="col-md-2">
            <?= Html::dropDownList('a_id', null,
                ArrayHelper::map(AcademicYear::find()->all(), 'academic_year_id', 'year'),
                ['class' => 'form-control',
                'prompt' => 'Select a year']) 
            ?>
        </div>
        <div class="col-md-2">
            <?= Html::dropDownList('program_id', null,
                ArrayHelper::map(Program::find()->all(), 'program_id', 'name'),
                ['class' => 'form-control',
                'prompt' => 'Select a program']) 
            ?>
        </div>
        <div class="col-md-2">
            <input type="text" name="course" class="form-control" placeholder="Course name">
        </div>
        <div class="col-md-2">
            <input type="text" name="instructor" class="form-control" placeholder="Instructor">
        </div>
        <div class="col-md-2">
            <input type="text" name="sem" class="form-control" placeholder="Semester">
        </div>
        <div class="col-md-2" >
            <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
            
        </div>
    </div>
    <?php ActiveForm::end(); ?>

    <?php 
        if(isset($students)){
    ?>

        <div id="sheet" class="container" style="color: black">
            <div class="text-center">
                <h2>PARVATIBAI CHOWGULE COLLEGE AUTONOMOUS</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5>Program: <?= Program::findOne($pid)->name ?></h5>
                    <h5>Course: <?= $course ?></h5>
                    
                </div>
                <div class="col-md-4">
                    <h5>Academic Year: <?= AcademicYear::findOne($aid)->year; ?></h5>
                    <h5>Instructor: <?= $instructor ?></h5>
                </div>
                <div class="col-md-4">
                    <h5>Semester: <?= $sem ?></h5>
                </div>
            </div>
            <table class="table table-bordered">
                <tr style="font-weight: bloder">
                    <td><b>Sr. No</b></td>
                    <td><b>Name</b></td>
                    <td><b>Roll No</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php 
                    
                    foreach($students as $key => $value){
                ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $value->student->name ?></td>
                    <td><?= $value->student->roll_no ?></td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
                    <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
        <div class="container text-center">
            <button><input type="button" onclick="printDiv('sheet')" value="Print" /></button>
        </div>

    <?php
        }
    ?>
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>