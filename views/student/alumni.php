<?php 
use app\models\AcademicYear;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
        <div class="row">
            <div class="col-md-3">
                <?= Html::dropDownList('a_id', null,
                    ArrayHelper::map(AcademicYear::find()->all(), 'academic_year_id', 'year'),
                    ['class' => 'form-control',
                    'prompt' => 'Select a year']) 
                ?>
            </div>
            <div class="col-md-3" >
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                
            </div>
        </div>
        <?php ActiveForm::end(); ?>

     <div class="row">
         <div class="col-md-3">
            <ul class="list-group">
                <?php 
                    if($students){
                        foreach($students as $student){
                            echo "<li class='list-group-item'>" .$student->student->name ."</li>";
                        }
                    }
                ?>
            </ul>
         </div>
         <div class="col-md-3">
            <ul class="list-group">
                <?php $form = ActiveForm::begin([
                    'method' => 'GET',
                ]); ?>
                <input type="hidden" name="aid" value="<?= $aid ?>">
                    <?php 
                        if($students){
                            foreach($students as $student){
                                echo "<input type='checkbox' class='form-control' name='". $student->student->roll_no ."' />";
                            }
                        }
                    ?>
                <div class="col-md-3" >
                    <?= Html::submitButton('Add Alumni', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </ul>
         </div>
     </div>