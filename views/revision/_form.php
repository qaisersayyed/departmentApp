<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Program;
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
    <?=$form->field($model,'program_id')->dropDownList(
		ArrayHelper::map(Program::find()->where(['status'=>1])->all(),'program_id','name'),
        ['prompt'=>'select ']        
)->label('Program Name')?>

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
<?php 

    $script = <<< HTML
        $(document).ready(function (){
            $("#revision-program_id").change(function (){
                $('#revision-paper_id').empty();
                program_id = $(this).val();
                console.log(program_id);
                $.ajax({
                    'method' : 'POST',
                    'url' : 'index.php?r=paper/get-papers&id='+program_id,
                    'success': function(data){
                        var data = jQuery.parseJSON(data);
                        $.each(data, function(key, value){
                            console.log(value.name);
                            console.log(value.paper_id);
                            $('#revision-paper_id').append("<option value='"+value.paper_id+"'>"+ value.name +"</option>");
                        });
                    }
                })
            });
        });
HTML;
$this->registerJS($script);
?>