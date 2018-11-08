<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPublished */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-published-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paper_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(
    DatePicker::className(), [
            // inline too, not bad
            'inline' => false, 
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
    ]);?>
    <?= $form->field($model, 'file')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
