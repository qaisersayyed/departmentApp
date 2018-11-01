<?php

use yii\helpers\Html;
//use kartik\export\ExportMenu;
use kartik\grid\GridView;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchDepartment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=department/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Department</a></h1>
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
            ['class' => 'kartik\grid\SerialColumn'],

            //'department_id',
            'name',
            

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            'heading'=> $this->title,
           
        ]
    ]); ?>
</div>
