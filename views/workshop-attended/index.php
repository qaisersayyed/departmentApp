<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchWorkshopAttended */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Workshop Attended';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-attended-index">

<h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=workshop-attended/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Workshop Attended</a></h1>

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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'workshop_attended_id',
            'workshop_title',
            'start_date',
            'end_date',
            'participant_name',
            //'student_involved',
            'student_name',
            [
                'label' => 'Academic Year',
                'value' => 'academicYear.year',
                'attribute' => 'academic_year',
                ], 
            //'description',
            //'file1',
            //'file2',
            //'file3',
            //'file4',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
