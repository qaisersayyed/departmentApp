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
    <br>
    <div class="row">
        <div class="col-md-3">
            <input type="text" id="name" class="form-control" placeholder="Student Name" />
        </div>
        <div class="col-md-3">
            <input type="text" id="roll"  class="form-control" placeholder="Roll Number">
        </div>
        <div class="col-md-3">
            <input type="button" id="add-student" value="Add" class="btn btn-default">
        </div>
    </div>
    <br>
        <div id="sheet" class="container" style="color: black">
            <div class="text-center">
                <h2>PARVATIBAI CHOWGULE COLLEGE AUTONOMOUS</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5>Program: <?= strtoupper(Program::findOne($pid)->name) ?></h5>
                    <h5>Course: <?= strtoupper($course) ?></h5>
                    
                </div>
                <div class="col-md-4">
                    <h5>Academic Year: <?= strtoupper(AcademicYear::findOne($aid)->year); ?></h5>
                    <h5>Instructor: <?= strtoupper($instructor) ?></h5>
                </div>
                <div class="col-md-4">
                    <h5>Semester: <?= $sem ?></h5>
                </div>
            </div>
            <table class="name-table table table-bordered">
                <tr style="font-weight: bloder" class="students">
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
                <tr class="students">
                    <td><?= $key + 1 ?></td>
                    <td><?= strtoupper($value->student->name) ?></td>
                    <td><?= strtoupper($value->student->roll_no) ?></td>
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
    <br><br>
    
<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<?php 

    $script = <<< JS
        
        $(document).ready(function(){
            $("#add-student").click(function(){
                srno = $(".students").length;
                console.log($(".students").length);
                roll = $('#roll').val();
                name = $('#name').val();
               // console.log(name);
                var tr = "<tr class='students'><td>"+srno+"</td><td>"+ roll.toUpperCase() +"</td><td>"+ name.toUpperCase() +"</td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td><td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>  <td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>  </tr>";
                $(".name-table").append(tr);
            });
        });
JS;
    $this->registerJS($script);
?>