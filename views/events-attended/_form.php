<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\EventsAttended */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-attended-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::className(), [
    'model' => $model,
    'attribute' => 'date',
        'clientOptions' => [
            'autoclose' => false,
            'format' => 'yyyy-mm-dd',
            'clearBtn' => true,
        ]
    ]);?>


<?= $form->field($model, 'end_date')->widget(DatePicker::className(), [
    'model' => $model,
    'attribute' => 'date',
        'clientOptions' => [
            'autoclose' => false,
            'format' => 'yyyy-mm-dd',
            'clearBtn' => true,
        ]
    ]);?>


    <?= $form->field($model, 'participants')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'student_involved')->checkBox() ?>

    <div id="hiddenDiv" style="display: none">
    <?= $form->field($model, 'students')->textarea(['rows' => 3]); ?> 
</div>

    <?= $form->field($model, 'file1')->fileInput() ;echo "<br>$model->file1</br>" ?>

    <?= $form->field($model, 'file2')->fileInput() ;echo "<br>$model->file2</br>" ?>

    <?= $form->field($model, 'file3')->fileInput() ;echo "<br>$model->file3</br>" ?>

    <?= $form->field($model, 'file4')->fileInput() ;echo "<br>$model->file4</br>" ?>
  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php
        $script = <<< JS
        $(document).ready(function(){
            $('#eventsattended-student_involved').change(function(){ // 
            $('#hiddenDiv').slideToggle(); // hiddenDiv replace our Dcl_nilaiblksk as model & table (model_table)
            }); 
        });
JS;
$this->registerJS($script);
    ?>

</div>
