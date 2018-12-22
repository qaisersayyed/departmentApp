<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchAcademicYear */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admission Years';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-year-index">

   <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=academic-year/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Admission Year</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

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

            //'academic_year_id',
            'year',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            'heading'=> $this->title,
           
        ]
    ]); ?>
</div>
