<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchExtensionActivities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="extension-activities-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'extension_activities_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'organising_unit') ?>

    <?= $form->field($model, 'contact_no') ?>

    <?= $form->field($model, 'teacher_no') ?>

    <?php // echo $form->field($model, 'student_no') ?>

    <?php // echo $form->field($model, 'teachers') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'is_awarded') ?>

    <?php // echo $form->field($model, 'scheme_name') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
