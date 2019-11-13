<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSeminarAttended */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seminar Attendeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminar-attended-index">

    <h1 ><?= Html::encode($this->title) ?>
        <a style="float:right" href="index.php?r=seminar-attended/create" class="btn btn-success">
        <span  class="glyphicon glyphicon-plus" ></span> Add Seminar Attended</a>

    </h1>

      

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

            // 'seminar_id',
            'title',
            [
                'label' => 'Start Date',
                'attribute' => 'start_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->start_date));
                }

            ],
            // 'end_date',
            'level',
            'attendee:ntext',
            'attended_as',
            //'student_present',
            //'student_name:ntext',
            //'user_id',
            //'file1:ntext',
            //'file2:ntext',
            //'file3:ntext',
            //'file4:ntext',
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
