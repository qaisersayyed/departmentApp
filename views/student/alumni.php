

<?php
use app\models\AcademicYear;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ProgramStudent;
use app\models\Program;


use yii\data\ActiveDataProvider;

$this->title = 'Alumni';
$this->params['breadcrumbs'][] = $this->title;


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
        <div class="col-md-3">
            <?= Html::dropDownList('program_id', null,
                ArrayHelper::map(Program::find()->all(), 'program_id', 'name'),
                ['class' => 'form-control',
                'prompt' => 'Select a program']) 
            ?>
        </div>
        <div class="col-md-3" >
            <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
            
        </div>
    </div>
    <?php ActiveForm::end(); ?>

 <div class="row" style="margin-top: 20px;">
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
                        echo '<br>';
                        echo Html::submitButton('Add Alumni', ['class' => 'btn btn-success']);

                    }
                ?>
            <div class="col-md-3" >
            </div>
            <?php ActiveForm::end(); ?>
        </ul>
     </div>
 </div>
     <?php

       /*  $query = ProgramStudent::find()->joinwith('student')->where(['program_student.status'=>1])->andWhere(['alumni' => 1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' =>[
                'pageSize' => 10,
            ]
        ]); */
     ?>
     <?php //=
    //  GridView::widget([
     
    //  'dataProvider' => $dataProvider,
    //  'autoXlFormat'=>true,
    //  'export'=>[
    //  'label' => 'Export',
    //  'fontAwesome'=>true,
    //  'showConfirmAlert'=>false,
    //  'target'=>GridView::TARGET_BLANK
    //  ],
    //  'columns' => [
    //      ['class' => 'kartik\grid\SerialColumn'],

        //  [
        //     'label' => 'Program Name',
        //     'value' => 'program.name',
        //     'attribute' => 'program_id',
        // ],
        // [
        //  'label' => 'Student Name',
        //  'value' => 'student.name',
        //  'attribute' => 'student_id',
        //  ],
       // 'created_at',
       // 'updated_at',
       // 'status',
    //    [
    //     'label' => 'Roll No.',
    //     'value' => 'student.roll_no',
    //     'attribute' => 'roll_no',
    //     ],
      
    //     'student.phone_no',
    //     'student.email',
    //    [
    //      'label' => 'Admission Year',
    //      'value' => 'academicYear.year',
    //      'attribute' => 'academic_year_id',
    //      ],
        
         //'created_at',
         //'updated_at',
         //'status',
         

         
//      ],
//      'pjax'=>true,
//      'showPageSummary'=>false,
//      'panel'=>[
         
//          'heading'=> $this->title,
        
//      ]
//  ]);
//?>
