<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Paper;
use app\models\Program;
use app\models\Type;
use app\models\AcademicYear;

/* @var $this yii\web\View */
/* @var $model app\models\PaperType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paper-type-form" style="width:50%">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($paper, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($paper, 'program_id')->dropDownList(
        ArrayHelper::map(Program::find()->all(),'program_id','name'),
        ['prompt'=>'select ']       
   )  
    ?>
    <?= $form->field($paper, 'credit')->textInput() ?>
    <?= $form->field($paper, 'marks')->textInput() ?>
   

    <?= $form->field($model, 'type_id')->dropDownList(
		ArrayHelper::map(Type::find()->where(['status'=>1])->all(),'type_id','name'),
		['prompt'=>'select ']
        
	) ?>

    <?= $form->field($model, 'academic_year_id')->dropDownList(
		ArrayHelper::map(AcademicYear::find()->orderBy(['year'=>SORT_DESC])->all(),'academic_year_id','year')
       
	) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
