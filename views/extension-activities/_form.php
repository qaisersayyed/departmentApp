<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ExtensionActivities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="extension-activities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organising_unit')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->dropDownList(['Cetificate' => 'Cetificate', 'Training Program' => 'Training Program',
    'Community Outreach'=> 'Community Outreach','Other'=>'Other'])?>

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

    <?= $form->field($model, 'contact_no')->textInput() ?>
    
    <?= $form->field($model, 'teacher_no')->textInput() ?>

    <?= $form->field($model, 'student_no')->textInput() ?>

    <?= $form->field($model, 'participant_no')->textInput() ?>

    <?= $form->field($model, 'male')->textInput() ?>

    <?= $form->field($model, 'female')->textInput() ?>

    <?= $form->field($model, 'teachers')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
    
    <?= $form->field($model, 'is_awarded')->textInput()?>

    <?= $form->field($model, 'scheme_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file1')->fileInput();echo "<br>$model->file1</br>" ?>

<?= $form->field($model, 'file2')->fileInput();echo "<br>$model->file2</br>" ?>

<?= $form->field($model, 'file3')->fileInput();echo "<br>$model->file3</br>" ?>

<?= $form->field($model, 'file4')->fileInput();echo "<br>$model->file4</br>" ?>


   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
