<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchBookPublished */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-published-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'book_published_id') ?>

    <?= $form->field($model, 'book_title') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'edited_volume') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'publisher') ?>

    <?php // echo $form->field($model, 'isbn') ?>

    <?php // echo $form->field($model, 'student_involved') ?>

    <?php // echo $form->field($model, 'student_name') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'file1') ?>

    <?php // echo $form->field($model, 'file2') ?>

    <?php // echo $form->field($model, 'file3') ?>

    <?php // echo $form->field($model, 'file4') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
