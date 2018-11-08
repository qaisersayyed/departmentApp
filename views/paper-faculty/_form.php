<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Faculty;
use app\models\Program;
use app\models\Paper;
use app\models\AcademicYear;


/* @var $this yii\web\View */
/* @var $model app\models\PaperFaculty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-faculty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'program_id')->dropDownList(
        ArrayHelper::map(Program::find()->all(),'program_id','name'),
        ['prompt'=>'select ']
    )->label('Program Name')?>
    <?= $form->field($model, 'paper_id')->dropDownList(
       []
    )?>

    <?= $form->field($model, 'faculty_id')->dropDownList(
        ArrayHelper::map(Faculty::find()->all(),'faculty_id','name'),
        ['prompt'=>'select ']
    )?>

    <?= $form->field($model, 'academic_year_id')->dropDownList(
        ArrayHelper::map(AcademicYear::find()->all(),'academic_year_id','year'),
        ['prompt'=>'select ']
    )?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 

    $script = <<< HTML
        $(document).ready(function (){
            $("#paperfaculty-program_id").change(function (){
                $('#paperfaculty-paper_id').empty();
                program_id = $(this).val();
                console.log(program_id);
                $.ajax({
                    'method' : 'POST',
                    'url' : 'index.php?r=paper/get-papers&id='+program_id,
                    'success': function(data){
                        var data = jQuery.parseJSON(data);
                        $.each(data, function(key, value){
                            console.log(value.name);
                            console.log(value.paper_id);
                            $('#paperfaculty-paper_id').append("<option value='"+value.paper_id+"'>"+ value.name +"</option>");
                        });
                    }
                })
            });
        });
HTML;
$this->registerJS($script);
?>