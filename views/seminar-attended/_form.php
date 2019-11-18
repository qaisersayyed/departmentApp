<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\SeminarAttended */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seminar-attended-form" style="width:50%">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'Workshop' => 'Workshop','Seminar' => 'Seminar',
    'Conference'=> 'Conference'],['prompt'=>'select '])?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    


    <?= $form->field($model, 'start_date')->widget(
    DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'clearBtn' => true,
            ]
    ]);?>

    <?= $form->field($model, 'end_date')->widget(
    DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'clearBtn' => true,
            ]
    ]);?>

    <?= $form->field($model, 'level')->dropDownList(['National Level' => 'National Level', 'State Level' => 'State Level',
    'Local Level'=> 'Local Level','International Level'=>'International Level'],['prompt'=>'select '])?>

    <?= $form->field($model, 'attendee')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attended_as')->dropDownList(['Speaker' => 'Speaker', 'Attendee' => 'Attendee'],['prompt'=>'select '])?>

    <?= $form->field($model, 'student_present')->checkBox() ?>
    
    <div id="hiddenDiv" style="display: none">
        <?= $form->field($model, 'student_name')->textarea(['rows' => 6]) ?> 
    </div>


    <?//= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'file1')->fileInput();echo "<br>$model->file1</br>" ?>

    <?= $form->field($model, 'file2')->fileInput();echo "<br>$model->file2</br>" ?>

    <?= $form->field($model, 'file3')->fileInput();echo "<br>$model->file3</br>" ?>

    <?= $form->field($model, 'file4')->fileInput();echo "<br>$model->file4</br>" ?>


    <? //= $form->field($model, 'created_at')->textInput() ?>

    <? // = $form->field($model, 'updated_at')->textInput() ?>

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
        // $(document).ready(function(){

            $(document).ready(function(){
            length = $('#seminarattended-student_present:checked').length;
            if(length == 1){
                $('#hiddenDiv').show();
            }
            $('#seminarattended-student_present').change(function(){
                $('#hiddenDiv').slideToggle();
            });
        });
        //     $('#seminarattended-student_present').change(function(){ // 
        //         if(document.getElementById("seminarattended-student_present").checked == true){
        //             $('#hiddenDiv').show();

        //         }else{
        //             console.log(document.getElementById("seminarattended-student_present").value);
        //             $('#hiddenDiv').hide();
                   
        //         }
                
        //     // $('#hiddenDiv').slideToggle(); // hiddenDiv replace our Dcl_nilaiblksk as model & table (model_table)
        //     }); 
        // });
JS;
$this->registerJS($script);
    ?>

</div>
