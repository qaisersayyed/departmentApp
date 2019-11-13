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

    <p >
        <?= Html::a('Add Student Education', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
    ]); ?>
</div>
