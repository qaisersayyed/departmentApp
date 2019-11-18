<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAuditingMember */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auditing Member';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditing-member-index">

    <h1><?= Html::encode($this->title) ?><a style="float:right" href="index.php?r=auditing-member/create" class="btn btn-success">
    <span class="glyphicon glyphicon-plus" ></span>Add Auditing Member</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a('Create Auditing Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

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
            ['class' => 'yii\grid\SerialColumn'],

            //'auditing_member_id',
            'name',
            [
                'label' => 'Start Date',
                'attribute'=>'start_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->start_date));
                }
            ],
            // [
            //     'label' => 'End Date',
            //     'attribute'=>'end_date',
            //     'value' => function($model){
            //         return date('d M Y', strtotime($model->end_date));
            //     }
            // ],
            'college_name:ntext',
            'program',
            [
                'label' => 'Faculty Name',
                'value' => 'faculty.name',
                'attribute' => 'faculty_id',
            ],
            'faculty_name:ntext',
            [
                'label' => 'Academic Year',
                'value' => 'academicYear.year',
                'attribute' => 'academic_year_id',
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
         
         'heading'=> $this->title,
        ]
    ]); ?>
</div>
