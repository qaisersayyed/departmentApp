<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAuditingMember */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auditing Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditing-member-index">

    <h1><?= Html::encode($this->title) ?><a style="float:right" href="index.php?r=auditing-member/create" class="btn btn-success">
    <span class="glyphicon glyphicon-plus" ></span>Add Auditing Member</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a('Create Auditing Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

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
            [
                'label' => 'End Date',
                'attribute'=>'end_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->end_date));
                }
            ],
            'college_name:ntext',
            'program',
            'faculty_name:ntext',
            [
                'label' => 'Department Name',
                'value' => 'department.name',
                'attribute' => 'department_id',
            ],
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
