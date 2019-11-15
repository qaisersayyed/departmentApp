<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Department;
use app\models\AcademicYear;
use app\models\Faculty;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


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

    <?= $form->field($model, 'participant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participant_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'faculty_id')->dropDownList(
    ArrayHelper::map(Faculty::find()->all(), 'faculty_id', 'name'),
    ['prompt'=>'select ']
)?>

    <?= $form->field($model, 'faculty_coordinator')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_coordinator')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'cost')->textInput() ?>

<?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>


<?= $form->field($model, 'academic_year_id')->dropDownList(
        ArrayHelper::map(AcademicYear::find()->orderBy(['year' => SORT_DESC ])->all(), 'academic_year_id', 'year')
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
