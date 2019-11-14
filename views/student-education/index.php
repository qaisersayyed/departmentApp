<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentEducationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Educations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-education-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php 
    if (Yii::$app->user->identity->username != 'admin') {
            ?>
            <a  href="index.php?r=student-education/create" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> Add Student Education</a>
        <!-- <p >
            <?= Html::a('Add Student Education', ['create'], ['class' => 'btn btn-success']) ?>
        </p> -->
    <?php } ?>

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


            'student_education_id',
            'institution_name:ntext',
            'degree',
            'date_of_joining',
            'created_at',
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
