<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Faculty;
use app\models\AcademicYear;

/* @var $this yii\web\View */
/* @var $model app\models\AuditingMember */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auditing-member-form">

    <?php $form = ActiveForm::begin(); ?>
    <br>
    <br>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'college_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'program')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty_id')->dropDownList(
        ArrayHelper::map(Faculty::find()->where(['user_id' => Yii::$app->user->id])->all(),'faculty_id','name'),
        ['prompt'=>'select ']
    )?>

    <?= $form->field($model, 'faculty_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'academic_year_id')->dropDownList(
        ArrayHelper::map(AcademicYear::find()->orderBy(['year' => SORT_DESC ])->all(),'academic_year_id','year')
    ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file1')->fileInput();echo "<br>$model->file1</br>" ?>

    <?= $form->field($model, 'file2')->fileInput();echo "<br>$model->file2</br>" ?>

    <?= $form->field($model, 'file3')->fileInput();echo "<br>$model->file3</br>" ?>

    <?= $form->field($model, 'file4')->fileInput();echo "<br>$model->file4</br>" ?>

    <?php
        $id= Yii::$app->user->id;
        echo $form->field($model, 'user_id')->hiddenInput(['value' => $id])->label(false);
    ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
