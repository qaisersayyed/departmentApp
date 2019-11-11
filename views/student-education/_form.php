<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Program;
use app\models\Student;
/* @var $this yii\web\View */
/* @var $model app\models\StudentEducation */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="student-education-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'program_id')->dropDownList(
            ArrayHelper::map(Program::find('name')->where(['program_id' => $program_id])->all(),'program_id','name'))
     ?>

         <?= $form->field($model, 'student_id')->dropDownList(
        ArrayHelper::map(Student::find('name')->where(['student_id' => $student_id])->all(),'student_id','name')
        
    ) ?>
    <?= $form->field($model, 'institution_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'degree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_joining')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
