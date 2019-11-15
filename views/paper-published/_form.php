<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPublished */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-published-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paper_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_name')->textInput(['maxlength' => true]) ?>

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

<?= $form->field($model, 'faculty')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'dgc_flag')->checkbox()?>

<div id="dropdown" style="display:none">
    <?= $form->field($model, 'group')->dropDownList(
        array('A'=>'Group A', 'B'=>'Group B','C'=>'Group C','D'=>'Group D',),
        ['prompt'=>'select ']
    )  ?>
</div>

<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'doi_link')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'h_index_author')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'h_index_journal')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'institute_affiliation')->textInput(['maxlength' => true]) ?>

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

    <?php
        $script= <<< JS
        
        $(document).ready(function(){
        length = $('#paperpublished-dgc_flag:checked').length;
        if(length == 1){
            $('#dropdown').show();
        }
        $('#paperpublished-dgc_flag').change(function(){
            $('#dropdown').slideToggle();
        });
    });
        

JS;
$this->registerJS($script);
        
    ?>
</div>
