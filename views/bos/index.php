<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBos */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'BOS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bos-index">

   <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=bos/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add BOS</a></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <?php $form = ActiveForm::begin([
        'method' => 'GET',
    ]); ?>
        <div class="row" >
            <div class="col-md-3">
                <p>From Date: </p>
            <?= DatePicker::widget([
                'name' => 'from',
                'template' => '{addon}{input}',

                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ]
            ]); ?>
            </div>
            <div class="col-md-3" >
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
            if ($searchModel->to != "" && $searchModel->from != "") {
                echo date('d M Y', strtotime($searchModel->from)) . " - ". date('d M Y', strtotime($searchModel->to)) ;
            } else {
                echo "None";
            }
        ?>
    </p>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'bos_id',
            'program',
            //'minutes:ntext',
            [
                'label' => 'Date',
                'attribute' => 'date',
                'value' => function ($model) {
                    return date('d M Y', strtotime($model->date));
                }
            ],

            [
                'label' => 'Revision',
                'attribute' => 'revision',
                'value' => function ($dataProvider) {
                    if ($dataProvider->revision == 1) {
                        return 'Revised';
                    } else {
                        return "Not Revised";
                    }
                }
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
    ]); ?>
</div>
