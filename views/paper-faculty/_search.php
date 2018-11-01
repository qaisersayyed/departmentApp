<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
<<<<<<< HEAD:views/academic-year/_search.php
/* @var $model app\models\SearchAcademicYear */
=======
/* @var $model app\models\SearchPaperFaculty */
>>>>>>> 3a39d20b29e21678f8e1dcbcc810e7e8f6231aea:views/paper-faculty/_search.php
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-faculty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'paper_faculty_id') ?>

    <?= $form->field($model, 'paper_id') ?>

    <?= $form->field($model, 'faculty_id') ?>

    <?= $form->field($model, 'academic_year_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
