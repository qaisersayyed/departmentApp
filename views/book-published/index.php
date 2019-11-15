<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchBookPublished */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Published';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-published-index">

    <h1><?= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=book-published/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Book Published</a></h1>

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
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'book_published_id',
            'book_title',
            'edited_volume',
            'date',
            'author',
            'publisher',
            'isbn',
            //'student_involved',
            'student_name',
            //'description:ntext',
            //'created_at',
            //'updated_at',
            //'file1:ntext',
            //'file2',
            //'file3',
            //'file4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
