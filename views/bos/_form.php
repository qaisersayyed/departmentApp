<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Department;
use app\models\AcademicYear;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Bos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'program')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'revision')->checkbox() ?>

    <?= $form->field($model, 'academic_year_id')->dropDownList(
        ArrayHelper::map(AcademicYear::find()->orderBy(['year' => SORT_DESC ])->all(), 'academic_year_id', 'year')
    ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file1')->fileInput();echo "<br>$model->file1</br>" ?>

    <?= $form->field($model, 'file2')->fileInput();echo "<br>$model->file2</br>" ?>

    <?= $form->field($model, 'file3')->fileInput();echo "<br>$model->file3</br>" ?>

    <?= $form->field($model, 'file4')->fileInput();echo "<br>$model->file4</br>" ?>

    <?php
            $id= Yii::$app->user->id;
            echo $form->field($model, 'user_id')->hiddenInput(['value' => $id])->label(false);
        ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
