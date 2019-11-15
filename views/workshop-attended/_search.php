<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchWorkshopAttended */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workshop-attended-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'workshop_attended_id') ?>

    <?= $form->field($model, 'workshop_title') ?>

    <?= $form->field($model, 'start_date') ?>

    <?= $form->field($model, 'end_date') ?>

    <?= $form->field($model, 'participant_name') ?>

    <?php // echo $form->field($model, 'student_involved') ?>

    <?php // echo $form->field($model, 'student_name') ?>

    <?php // echo $form->field($model, 'academic_year') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'file1') ?>

    <?php // echo $form->field($model, 'file2') ?>

    <?php // echo $form->field($model, 'file3') ?>

    <?php // echo $form->field($model, 'file4') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
