<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchInternship */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Internships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="internship-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <a style="float:right" href="index.php?r=internship/create" class="btn btn-success">
    <span  class="glyphicon glyphicon-plus" ></span>Add Internship</a>


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
