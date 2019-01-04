<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'project_id',
            'approval_id',
            'name',
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
            'agency.name',
            'duration',
            'amount',
            'faculty_name:ntext',
            'student_name:ntext',
            'department.name',
            'academicYear.year',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

    <?php if ($model->project_file){?>
        <a class="btn btn-default" href='<?= $model->project_file ?>'Download>Download Project File1</a>
    <?php } ?>
    <?php if ($model->project_file2){?>
        <a class="btn btn-default" href='<?= $model->project_file2 ?>'Download>Download Project File2</a>
    <?php }  ?>
    <?php if ($model->project_file3){?>
        <a class="btn btn-default" href='<?= $model->project_file3 ?>'Download>Download Project File3</a>
    <?php } ?>
    <?php if ($model->project_file4){?>
        <a class="btn btn-default" href='<?= $model->project_file4 ?>'Download>Download Project File4</a>
    <?php }  ?>
</div>
