<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\BookPublished */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-published-form" style="width: 50%">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edited_volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(
    DatePicker::className(), [
            'inline' => false, 
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'minViewMode' => 'months',
            ]
    ]);?>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_involved')->checkBox(); ?> 

    <div id="hiddenDiv" style="display: none">
        <?= $form->field($model, 'student_name')->textInput(); ?> 
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file1')->fileInput();echo "<br>$model->file1</br>" ?>

    <?= $form->field($model, 'file2')->fileInput();echo "<br>$model->file2</br>" ?>

    <?= $form->field($model, 'file3')->fileInput();echo "<br>$model->file3</br>" ?>

    <?= $form->field($model, 'file4')->fileInput();echo "<br>$model->file4</br>" ?>

    <?php
        $id= Yii::$app->user->id;
        echo $form->field($model, 'user_id')->hiddenInput(['value' => $id])->label(false);
    ?>

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
            $('#bookpublished-student_involved').change(function(){ // 
            $('#hiddenDiv').slideToggle(); // hiddenDiv replace our Dcl_nilaiblksk as model & table (model_table)
            }); 
        });
JS;
$this->registerJS($script);
    ?>

</div>
