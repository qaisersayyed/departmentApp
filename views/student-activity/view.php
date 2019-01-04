<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentActivity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Student Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-activity-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'student_activity_id',
            'name',
            'budget',
            [
                'label'=>'Start Date',
                'value'=>function($model){
                    return date('d M Y', strtotime($model->start_date));
                },
                'attribute' => 'start_date',
            ],
          
            [
                'label'=>'End Date',
                'value'=>function($model){
                    return date('d M Y', strtotime($model->end_date));
                },
                'attribute' => 'end_date',
            ],
            'faculty_name:ntext',
            'student_name:ntext',
            'department.name',
            'academicYear.year',
            //'created_at',
           // 'updated_at',
        ],
    ]) ?>
        <a class="btn btn-default" href='<?= $model->activity_file ?>'Download>Download Student Activity File1</a>
        <a class="btn btn-default" href='<?= $model->activity_file2 ?>'Download>Download Student Activity File2</a>
        <a class="btn btn-default" href='<?= $model->activity_file3 ?>'Download>Download Student Activity File3</a>
        <a class="btn btn-default" href='<?= $model->activity_file4 ?>'Download>Download Student Activity File4</a>
</div>
