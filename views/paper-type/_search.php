<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchPaperType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'paper_type_id') ?>

    <?= $form->field($model, 'paper_id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'academic_year_id') ?>
    

    <?php // echo $form->field($model, 'status') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
