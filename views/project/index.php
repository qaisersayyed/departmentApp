
<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProject */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1 ><?= Html::encode($this->title) ?>
        <a style="float:right" href="index.php?r=project/create" class="btn btn-success">
        <span  class="glyphicon glyphicon-plus"></span> Add Project</a>

    </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php $form = ActiveForm::begin([
    'method' => 'GET',
]); ?>
    <div class="row" >
        <div class="col-md-3">
            <p>From Date: </p>
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
        <p>To Date: </p>
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
    </div>
    
 <?php ActiveForm::end(); ?>
<div class="text-right">
    <p><b>Search Result: </b>
    <?php 
        if($searchModel->to != "" && $searchModel->from != ""){
            echo date('Y', strtotime($searchModel->from)) . " - ". date('Y', strtotime($searchModel->to)) ;
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
            //'project_id',
            'approval_id',
            'name',
            [
                'label'=>'Start Date',
                'value'=>function($model){
                    return date('d M Y', strtotime($model->start_date));
                },
                'attribute' => 'start_date',
            ],
          
            /*[
                'label'=>'End Date',
                'value'=>function($model){
                    return date('d M Y', strtotime($model->end_date));
                },
                'attribute' => 'end_date',
            ],*/
            [
                'label' => 'Agency Name',
                'value' => 'agency.name',
                'attribute' => 'agency_id',
            ],
            
            'duration',
            //'amount',
            'faculty_name:ntext',
            //'student_name:ntext',
            /*[
                'label' => 'Department Name',
                'value' => 'department.name',
                'attribute' => 'department_id',
            ],*/
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
