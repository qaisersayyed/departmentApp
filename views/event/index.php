<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchEvent */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=event/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Event</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
        <div class="row">
            <div class="col-md-3">
                <p>From Date: </p>
            <?= DatePicker::widget([
                'name' => 'from',
                'template' => '{addon}{input}',

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>
            </div>
            <div class="col-md-3">
            <p>To Date: </p>
            <?= DatePicker::widget([
                'name' => 'to',
                'template' => '{addon}{input}',

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]); ?>
            </div>
            <div class="col-md-3" style="padding:29px 0px 0px 20px;">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                
            </div>
        </div>
     <?php ActiveForm::end(); ?>
    <div class="text-right">
        <p><b>Search Result: </b>
        <?php 
            if($searchModel->to != "" && $searchModel->from != ""){
                echo date('d M Y', strtotime($searchModel->from)) . " - ". date('d M Y', strtotime($searchModel->to)) ;
            }else{
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
        'target'=>GridView::TARGET_BLANK
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'event_id',
            'name',
            //'venue',
            [
                'label' => 'Event Type',
                'attribute' => 'inhouse',
                'value' => function($dataProvider){
                    if($dataProvider->inhouse == 0){
                            return 'Attended';
                    }else{
                        return "Conducted";
                    }

                }
            ],
            //'cost',
            'participant:ntext',
            [
                'label' => 'Faculty Coordinator',
                'value' => 'faculty.name',
                'attribute' => 'faculty_id',
                
            ],
            'faculty_coordinator',
            'student_coordinator',
            [
                'label' => 'Start Date',
                'attribute' => 'start_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->start_date));
                }

            ],
            //'end_date',
            /*
            [
                'label' => 'Department Name',
                'value' => 'department.name',
                'attribute' => 'department_id',
                ],
            */
            [
                'label' => 'Academic Year',
                'value' => 'academicYear.year',
                'attribute' => 'academic_year_id',
                ],    
            //'created_at',
            //'updated_at',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            
            'heading'=> $this->title,
           
        ]
    ]); ?>
</div>
