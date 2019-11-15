<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchEventsAttended */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-attended-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'event_attended_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'end_date') ?>

    <?= $form->field($model, 'participants') ?>

    <?php // echo $form->field($model, 'student_involved') ?>

    <?php // echo $form->field($model, 'students') ?>

    <?php // echo $form->field($model, 'file1') ?>

    <?php // echo $form->field($model, 'file2') ?>

    <?php // echo $form->field($model, 'file3') ?>

    <?php // echo $form->field($model, 'file4') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
