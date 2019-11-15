<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Department;
use app\models\AcademicYear;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Seminar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seminar-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php // echo $model->seminar_id; ?>
    <?// = $form->field($model, 'speaker_name')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'Workshop' => 'Workshop','Seminar' => 'Seminar',
    'Conference'=> 'Conference'], ['prompt'=>'select '])?>

    <div id="hiddenDiv" style="display: none">
        <?= $form->field($model, 'conducted_type')->dropDownList(['Others'=>'Others','Intellectual Property Right' => 'Intellectual Property Right', 'Industry Academics' => 'Industry Academics',
        'Environment Related'=>'Environment Related','Gender'=>'Gender','Women Empowerment'=>'Women Empowerment'])?>
    </div>

    <?= $form->field($model, 'level')->dropDownList(['National Level' => 'National Level', 'State Level' => 'State Level',
    'Local Level'=> 'Local Level','International Level'=>'International Level'], ['prompt'=>'select '])?>

    <?= $form->field($model, 'faculty_organizer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty_attended')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'participant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'participant_name')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_of_male')->textInput() ?>

    <?= $form->field($model, 'no_of_female')->textInput() ?>

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

   

    <!-- <?= $form->field($model, 'department_id')->dropDownList(
        ArrayHelper::map(Department::find()->all(),'department_id','name'),
        ['prompt'=>'select ']
    )?> -->

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

    <?php 
        $script = <<< JS
        $(document).ready(function(){
            $('#seminar-type').change(function(){ 
                if(document.getElementById("seminar-type").value == 'Seminar'){
                    $('#hiddenDiv').show();

                }else{
                    console.log(document.getElementById("seminar-conducted_type").value);
                    $('#hiddenDiv').hide();
                   
                }
            });
        });
JS;
$this->registerJS($script);
    ?>

</div>
