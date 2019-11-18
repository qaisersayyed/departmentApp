<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Program;
use app\models\Student;
use app\models\AcademicYear;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramStudent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="program-student-form">
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'program_id')->dropDownList(
        ArrayHelper::map(Program::find()->where(['status' => 1])->all(),'program_id','name'),
        ['prompt'=>'select ']
    ) ?>

    <?= $form->field($model, 'academic_year_id')->dropDownList(
        ArrayHelper::map(AcademicYear::find()->orderBy(['year' => SORT_DESC ])->all(),'academic_year_id','year')
        
    ) ?>
        <?= $form->field($student, 'name')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($student, 'roll_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($student, 'phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($student, 'email')->textInput(['maxlength' => true]) ?>


    <?php
        $id= Yii::$app->user->id;
        $form->field($model, 'user_id')->hiddenInput(['value' => $id])->label(false);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
