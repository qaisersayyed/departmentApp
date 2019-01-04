<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAppointment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-index">

     <h1><?= Html::encode($this->title) ?><a style="float:right" href="index.php?r=appointment/create" class="btn btn-success">
    <span class="glyphicon glyphicon-plus" ></span> Add Appointment</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a('Create Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    


<?=     GridView::widget([
     
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

        //'appointment_id',
        
        [
            'label' => 'Faculty Name',
            'value' => 'faculty.name',
            'attribute' => 'faculty_id',
            ],
        [
            'label' => 'Date of joining',
            'attribute'=>'date_of_joining',
            'value' => function($model){
                return date('d M Y', strtotime($model->date_of_joining));
            }
        ],
        [
            'label' => 'Date of leaving',
            'attribute'=>'date_of_leaving',
            'value' => function($model){
                return date('d M Y', strtotime($model->date_of_leaving));
            }
        ],
        'Type',
        
            
        /*[
            'label' => 'Contact no',
            'value' => 'faculty.phone_no',
            'attribute' => 'faculty_id',
            ],
        [
            'label' => 'Email',
            'value' => 'faculty.email',
            'attribute' => 'faculty_id',
            ],*/
        [
            'label' => 'Employee ID',
            'value' => 'faculty.employee_id',
            
            ],

        ['class' => 'yii\grid\ActionColumn'],
     ],
     'pjax'=>true,
     'showPageSummary'=>false,
     'panel'=>[
         
         'heading'=> $this->title,
        
     ]
 ]); ?>

</div>
