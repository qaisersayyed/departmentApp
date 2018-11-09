<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPaperFaculty */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Course';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-faculty-index">

   <h1><?= Html::encode($this->title) ?><a style="float:right" href="index.php?r=paper-faculty/create" class="btn btn-success">
    <span class="glyphicon glyphicon-plus" ></span> Assign Paper</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!-- <p>
        <?= Html::a('Create Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

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
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'paper_faculty_id',
            [
                'label' => 'Program Name',
                'value' => 'program.name',
                'attribute' => 'program_id',
            ],
            [
                'label' => 'Course Name',
                'value' => 'paper.name',
                'attribute' => 'paper_id',
            ],
            [
                'label' => 'Faculty Name',
                'value' => 'faculty.name',
                'attribute' => 'faculty_id',
            ],
            'semester',
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
        ],
    ]); ?>
</div>
