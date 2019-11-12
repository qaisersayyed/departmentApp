<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProgramStudent */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-student-index">

    <h1><?= Html::encode($this->title) ?> </h1>
    <a Style="float:right;" href="index.php?r=program-student/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Student</a>
   

    <a Style="float:right;" href="index.php?r=student/alumni" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Alumni</a>


   
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>


   <?php $form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
        <div class="row"  >
            <div class="col-md-3">
                
                <input type="text" name='roll_no' class='form-control' placeholder="Search Roll No.">
            </div>
           
        
            <div class="col-md-3">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                
            </div>
        </div>
     <?php ActiveForm::end(); ?>
     <?php $form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
        <div class="row"  >
            <div class="col-md-2">
            <div class="form-group">
            <select class="form-control" value="ssk" name="a_status">
               <option value="" disabled selected>Search by status</option>
                <option  value=1>Alumni</option>
                <option value=2>Studying</option>
   
            </select>
            </div>
            
            </div>
          
        
            <div class="col-sm-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success ']) ?>
                
            </div>
        </div>
     <?php ActiveForm::end(); ?>

    <div class="text-right">
        <p><b>Search Result: </b>
        <?php
            if ($searchModel->roll_no != "") {
                echo $searchModel->roll_no ;
            } else {
                echo "None";
            }
        ?>
    </p>
    </div>

    <?= GridView::widget([
     
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat'=>true,
        'export'=>[
        'label' => 'Export',
        'fontAwesome'=>true,
        'showConfirmAlert'=>false,
        'target'=>GridView::TARGET_BLANK,
        
        ],
        'rowOptions' => function ($dataProvider) {
            if ($dataProvider->student->alumni == 0) {
                return ['class' => 'success'];
            } else {
                return ['class' => 'warning'];
            }
        },
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'program_student_id',
            [
                'label' => 'Program Name',
                'value' => 'program.name',
                'attribute' => 'program_id',
            ],
            [
             'label' => 'Student Name',
             'value' => 'student.name',
             'attribute' => 'student_id',
             ],
           // 'created_at',
           // 'updated_at',
          
           [
            'label' => 'Roll No.',
            'value' => 'student.roll_no',
            'attribute' => 'roll_no',
            ],
          
            'student.phone_no',
            'student.email',
            [
                'label' => 'Status',
                'value' => function ($dataProvider) {
                    if ($dataProvider->student->alumni == 0) {
                        return 'Studying';
                    } else {
                        return "Alumni";
                    }
                },
                'attribute' => 'alumni',
                
            ],
           [
             'label' => 'Admission Year',
             'value' => 'academicYear.year',
             'attribute' => 'academic_year_id',
             ],
            

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            
            'heading'=> $this->title,
           
        ]
    ]); ?>


</div>
