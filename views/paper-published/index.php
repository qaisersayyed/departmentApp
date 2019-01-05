<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPaperPublished */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paper Published';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-published-index">

    <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=paper-published/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Paper Published</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
        <div class="row">
            <div class="col-md-3">
                <p>From Date: </p>
            <?= DatePicker::widget([
                'name' => 'from',
                'template' => '{addon}{input}',

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]); ?>
            </div>
            <div class="col-md-3">
            <p>To Date: </p>
            <?= DatePicker::widget([
                'name' => 'to',
                'template' => '{addon}{input}',

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]); ?>
            </div>
            <div class="col-md-3" style="padding:29px 0px 0px 20px;">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                
            </div>
        </div>
     <?php ActiveForm::end(); ?>
    <div class="text-right">
        <p><b>Search Result: </b>
        <?php 
            if($searchModel->to != "" && $searchModel->from != ""){
                echo date('d M Y', strtotime($searchModel->from)) . " - ". date('d M Y', strtotime($searchModel->to)) ;
            }else{
                echo "None";
            }
        ?>
    </p>
    </div>

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

            //          'paper_published_id',
            'paper_title',
            'journal_name',
            [
                'label' => 'Date',
                'attribute' => 'date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->date));
                }

            ],
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
