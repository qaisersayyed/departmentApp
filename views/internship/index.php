<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use dosamigos\datepicker\DatePicker;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchInternship */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Internships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="internship-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   

    <?php $form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
        <div class="row" >
            <div class="col-md-3">
                <p>From Year: </p>
            <?= DatePicker::widget([
                'name' => 'from',
                'template' => '{addon}{input}',

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy',
                ]
            ]); ?>
            </div>
            <div class="col-md-3" >
            <p>To Year: </p>
            <?= DatePicker::widget([
                'name' => 'to',
                'template' => '{addon}{input}',

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy',
                ]
            ]); ?>
            
            </div>
            <div class="col-md-3" style="padding:29px 0px 0px 20px;">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                
            </div>
            <a style="float:right" href="index.php?r=internship/create" class="btn btn-success">
            <span  class="glyphicon glyphicon-plus" ></span>Add Internship</a>

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
            [
                'label' => 'Program Name',
                'value' => 'program.name',
                'attribute' => 'program_id',
            ],
            [
                'label' => 'Student name',
                'value' => 'student.name',
                'attribute' => 'student_id',
            ],
            
            //'internship_id',
            //'program_id',
            //'student_id',
            [
                'label' => 'Academic Year',
                'value' => 'academicYear.year',
                'attribute' => 'academic_year_id'
            ],
            'company',
            //'start_date',
            //'end_date',
            [
                'attribute'=>'hours',
                'pageSummary' => true,
            ],
            //'hours',
            //'file:ntext',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>true,
        'panel'=>[
            
            'heading'=> $this->title,
           
        ]
    ]); ?>
</div>
