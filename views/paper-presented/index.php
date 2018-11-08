<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPaperPresented */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paper Presenteds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-presented-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Paper Presented', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'paper_presented_id',
            //'paper_presented_file:ntext',
            'paper_title',
            'conference_name',
            'venue',
            'date',
            //'created_at',
            //'updated_at',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
