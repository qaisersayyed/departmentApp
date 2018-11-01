<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Paper;
use app\models\AcademicYear;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Revision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revision-form" style="width:50%">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'syllabus_file')->fileInput() ?>
    
    <?= $form->field($model, 'syllabus_date')->widget(DatePicker::className(), [
    'model' => $model,
    'attribute' => 'syllabus_date',
        'clientOptions' => [
            'autoclose' => false,
            'format' => 'yyyy-mm-dd'
        ]
]);?>
    

	<?=$form->field($model,'paper_id')->dropDownList(
		ArrayHelper::map(Paper::find()->where(['status'=>1])->all(),'paper_id','name'),
		['prompt'=>'select ']
)?>


		<?=$form->field($model,'academic_year_id')->dropDownList(
		ArrayHelper::map(AcademicYear::find()->orderBy(['year'=>SORT_DESC])->all(),'academic_year_id','year')
)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
