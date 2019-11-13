<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchEventsAttended */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events Attendeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-attended-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Events Attended', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'event_attended_id',
            'title',
            'start_date',
            'end_date',
            'participants:ntext',
            //'student_involved',
            //'students:ntext',
            //'file1:ntext',
            //'file2:ntext',
            //'file3:ntext',
            //'file4:ntext',
            //'created_at',
            //'updated_at',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
