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

    <?= $form->field($model, 'contact_no')->textInput() ?>

    <?= $form->field($model, 'teacher_no')->textInput() ?>

    <?= $form->field($model, 'student_no')->textInput() ?>

    <?= $form->field($model, 'teachers')->textarea(['rows' => 6]) ?>


    <?= $form->field($model, 'date')->widget(
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

    <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>



    
    <?= $form->field($model, 'is_awarded')->dropDownList(['1' => 'Yes', '0' => 'No'])?>

    <?= $form->field($model, 'scheme_name')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
