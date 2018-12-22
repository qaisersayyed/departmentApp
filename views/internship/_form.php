<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Student;
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
        ArrayHelper::map(Program::find()->all(),'program_id','name'),
        ['prompt'=>'select ']       
    )  
    ?>
    <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map(Student::find()->all(),'student_id','name'),
        ['prompt'=>'select ']       
    )  
    ?>

   <?= $form->field($model, 'academic_year')->dropDownList(
        ArrayHelper::map(AcademicYear::find()->all(),'academic_year_id','year'),
        ['prompt'=>'select ']       
   )  
    ?>

    <?= $form->field($model, 'company')->textInput() ?>

     <?= $form->field($model, 'start_date')->widget(
    DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>
    <br>
    <?= $form->field($model, 'end_date')->widget(
    DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>

    <?= $form->field($model, 'hours')->textInput() ?>
    <br>
    <?= $form->field($model, 'file')->fileInput() ?>
    <br>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
