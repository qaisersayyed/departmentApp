<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Event */

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'event_id',
            'name',
            'venue',
            [
                'label' => 'Event Type',
                'attribute' => 'inhouse',
                'value' => function($model){
                    if($model->inhouse == 0){
                            return 'Attended';
                    }else{
                        return "Conducted";
                    }

                }
            ],
            'cost',
            'participant:ntext',
            [
                'label' => 'Faculty Coordinator',
                'value' => 'faculty.name',
                'attribute' => 'faculty_id',
                
            ],
            'faculty_coordinator',
            'student_coordinator',
            [
                'label' => 'Start Date',
                'attribute' => 'start_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->start_date));
                }

            ],
            [
                'label' => 'End Date',
                'attribute' => 'end_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->end_date));
                }

            ],
            'department.name',
            'academicYear.year',
            //'created_at',
            //'updated_at',
            //'file',
        ],
    ]) ?>
    <?php if ($model->file1 ){ echo "<h2>File 1</h2>"?>
        
        <a class="btn btn-default" href='<?= $model->file1 ?>' Download>Download File 1</a>
    <?php } ?>
    <?php if ($model->file2 ){ echo "<br><h2>File 2</h2>" ?>
        <a class="btn btn-default" href='<?= $model->file2 ?>' Download>Download File 2</a>
        <?php } ?>
    <?php if ($model->file3 ){  echo "<h2>File 3</h2>" ?>
        <a class="btn btn-default" href='<?= $model->file3 ?>' Download>Download File 3</a>
        <?php } ?>
    <?php if ($model->file4 ){  echo "<h2>File 4</h2>" ?> 
        <a class="btn btn-default" href='<?= $model->file4 ?>' Download>Download File 4</a>
  
        <?php } ?>
    
    
</div>
