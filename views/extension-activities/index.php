<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchExtensionActivities */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Extension Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extension-activities-index">

    <h1><?= Html::encode($this->title) ?>
    <a Style="float:right" href="index.php?r=extension-activities/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Extension Activity</a>
  </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>


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

            // 'extension_activities_id',
            'title',
            'organising_unit:ntext',
            'type',
            'contact_no',
            'teacher_no',
            'student_no',
            'male',
            'female',
            'teachers:ntext',
            'participant_no',
            'start_date',
            'end_date',
            'is_awarded',
            'scheme_name',
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
