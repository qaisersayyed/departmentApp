<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentEducation */

$this->title = $model->student_education_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-education-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        <?// = Html::a('Update', ['update', 'id' => $model->student_education_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->student_education_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'student_education_id',
            'institution_name:ntext',
            'degree',
            // 'date_of_joining',
            [
                'label' => 'Date of joining',
                'attribute' => 'date_of_joining',
                'value' => function($model){
                    return date('d M Y', strtotime($model->date_of_joining));
                }

            ],
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
