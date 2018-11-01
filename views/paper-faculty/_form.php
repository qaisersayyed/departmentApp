<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Faculty;
use app\models\Paper;
use app\models\AcademicYear;


/* @var $this yii\web\View */
/* @var $model app\models\PaperFaculty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-faculty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paper_id')->dropDownList(
        ArrayHelper::map(Paper::find()->all(),'paper_id','name'),
        ['prompt'=>'select ']
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
