<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSubjectExpert */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subject Experts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-expert-index">

    <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=subject-expert/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Subject Expert</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
        GridView::widget([
     
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

            //'subject_expert_id',
            [
                'label' => 'Faculty Name',
                'value' => 'faculty.name',
                'attribute' => 'faculty_id',
            ],
            // [
            //     'label' => 'Department Name',
            //     'value' => 'department.name',
            //     'attribute' => 'department_id',
            // ],
            [
                'label' => 'Academic Year',
                'value' => 'academicYear.year',
                'attribute' => 'academic_year_id',
                ],
            'description',
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
