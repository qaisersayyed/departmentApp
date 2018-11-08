<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Organization;
use app\models\Student;
use app\models\Program;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\StudentOrganization */
/* @var $form yii\widgets\ActiveForm */// 
?>

<div class="student-organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'program_id')->dropDownList(
        ArrayHelper::map(Program::find()->all(),'program_id','name'),
        ['prompt'=>'select ']       
   )  ?>

    <?= $form->field($model, 'organization_id')->dropDownList(
        ArrayHelper::map(Organization::find()->all(),'organization_id','company_name'),
        ['prompt'=>'select ']
    ) ?>

    <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map(Student::find()->where(['status' => 1])->all(),'student_id','name'),
        ['prompt'=>'select ']
    ) ?>

    <?= $form->field($model, 'date_of_joining')->widget(
    DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>


    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 

$script = <<< HTML
    $(document).ready(function (){
        $("#studentorganization-program_id").change(function (){
            $('#studentorganization-student_id').empty();
            program_id = $(this).val();
            console.log(program_id);
            $.ajax({
                'method' : 'POST',
                'url' : 'index.php?r=program-student/get-student&id='+program_id,
                'success': function(data){
                    var data = jQuery.parseJSON(data);
                    $.each(data, function(key, value){
                        console.log(value.name);
                        console.log(value.student_id);
                        $('#studentorganization-student_id').append("<option value='"+value[0]+"'>"+ value[1] +"</option>");
                    });
                }
            })
        });
    });
HTML;
$this->registerJS($script);
?>



