<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPresented */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-presented-form" style="width:50%">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paper_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput() ?>

    <?= $form->field($model, 'conference_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
    'model' => $model,
    'attribute' => 'date',
        'clientOptions' => [
            'autoclose' => false,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>

    <?= $form->field($model, 'type')->dropDownList(['0' => 'Oral', '1' => 'Poster'])?>

    <?= $form->field($model, 'level')->dropDownList(['0' => 'State', '1' => 'National', '2' => 'International'])?>

    <?= $form->field($model, 'student_involved')->checkBox(); ?> 

    <div id="hiddenDiv" style="display: none">
        <?= $form->field($model, 'student_name')->textInput(); ?> 
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'paper_presented_file')->fileInput() ;echo "<br>$model->paper_presented_file</br>" ?>
    <?= $form->field($model, 'paper_presented_file2')->fileInput() ;echo "<br>$model->paper_presented_file2</br>" ?>
    <?= $form->field($model, 'paper_presented_file3')->fileInput() ;echo "<br>$model->paper_presented_file3</br>" ?>
    <?= $form->field($model, 'paper_presented_file4')->fileInput()  ;echo "<br>$model->paper_presented_file4</br>"?>

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
            $('#paperpresented-student_involved').change(function(){ // 
            $('#hiddenDiv').slideToggle(); // hiddenDiv replace our Dcl_nilaiblksk as model & table (model_table)
            }); 
        });
JS;
$this->registerJS($script);
    ?>
</div>
