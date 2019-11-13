<?php

use yii\helpers\Html;
//use yii\grid\GridView;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchEventsAttended */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events Attended';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-attended-index">

    <h1><?= Html::encode($this->title) ?><a style="float:right" href="index.php?r=events-attended/create" class="btn btn-success">
            <span  class="glyphicon glyphicon-plus" ></span> Add Attended Events</a>
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

            'title',
            'start_date',
            'end_date',
            'participants:ntext',
            [
                'label' => 'Student Involved',
                'value' => function ($dataProvider) {
                    if ($dataProvider->student_involved == 0) {
                        return 'No';
                    } else {
                        return "Yes";
                    }
                },
                'attribute' => 'student_involved',
            ],
            'students:ntext',
            //'file1:ntext',
            //'file2:ntext',
            //'file3:ntext',
            //'file4:ntext',
            //'created_at',
            //'updated_at',
            //'user_id',

            

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            
            'heading'=> $this->title,
           
        ]
    ]); ?>

</div>
