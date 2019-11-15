<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ProgramStudent;
use app\models\AcademicYear;
use app\models\Program;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Internship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="internship-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'program_id')->dropDownList(
    ArrayHelper::map(Program::find()->where(['user_id' => Yii::$app->user->id])->all(), 'program_id', 'name')
)  ?>
     <?= $form->field($model, 'student_id')->dropDownList(
    ArrayHelper::map(ProgramStudent::find()->where(['status' => 1])->where(['user_id' => Yii::$app->user->id])->all(), 'program_student_id', 'student.name'),
    ['prompt'=>'select ']
) ?>

   <?= $form->field($model, 'academic_year_id')->dropDownList(
    ArrayHelper::map(AcademicYear::find()->orderBy(['year' => SORT_DESC ])->all(), 'academic_year_id', 'year')
        // ['prompt'=>'select ']
)
    ?>

    <?= $form->field($model, 'company')->textInput() ?>

     <?= $form->field($model, 'start_date')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]
    );?>
    <br>
    <?= $form->field($model, 'end_date')->widget(
        DatePicker::className(),
        [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]
    );?>

    <?= $form->field($model, 'hours')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <br>
    <?= $form->field($model, 'file')->fileInput() ; echo "<b>$model->file</b> <br>" ?>
    <br>
    <?= $form->field($model, 'file1')->fileInput(); echo "<b>$model->file1</b> <br>" ?>
    <br>
    <?= $form->field($model, 'file2')->fileInput(); echo "<b>$model->file2</b> <br>"?>
    <br>
    <?= $form->field($model, 'file3')->fileInput(); echo "<b>$model->file3</b> <br>"?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$script = <<< HTML
    $(document).ready(function (){
        $("#internship-program_id").change(function (){
            $('#internship-student_id').empty();
            program_id = $(this).val();
            console.log(program_id);
            $.ajax({
                'method' : 'POST',
                'url' : 'index.php?r=program-student/get-student&id='+program_id ,
                'success': function(data){
                    var data = jQuery.parseJSON(data);
                    $.each(data, function(key, value){
                        console.log(value.name);
                        console.log(value.student_id);
                        $('#internship-student_id').append("<option value='"+value[0]+"'>"+ value[1] +"</option>");
                    });
                }
            })
        });
    });
HTML;
$this->registerJS($script);
?>

