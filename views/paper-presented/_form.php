<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPresented */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-presented-form" style="width:50%">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paper_presented_file')->fileInput() ;echo "<br>$model->paper_presented_file</br>" ?>
    <?= $form->field($model, 'paper_presented_file2')->fileInput() ;echo "<br>$model->paper_presented_file2</br>" ?>
    <?= $form->field($model, 'paper_presented_file3')->fileInput() ;echo "<br>$model->paper_presented_file3</br>" ?>
    <?= $form->field($model, 'paper_presented_file4')->fileInput()  ;echo "<br>$model->paper_presented_file4</br>"?>

    <?= $form->field($model, 'paper_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conference_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'venue')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'date')->widget(DatePicker::className(), [
    'model' => $model,
    'attribute' => 'date',
        'clientOptions' => [
            'autoclose' => false,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
