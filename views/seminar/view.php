<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seminar */

//$this->title = $model->speaker_name;
$this->params['breadcrumbs'][] = ['label' => 'Seminars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'seminar_id',
            // 'speaker_name:ntext',
            'conducted_type:ntext',
            'faculty_organizer:ntext',
            'faculty_attended:ntext',
            'participant:ntext',
            'participant_name:ntext',
            'no_of_male',
            'no_of_female',
            'academicYear.year',
            'description:ntext',
            'venue',
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
            
            

            // [
            //     'label' => 'Seminar Type',
            //     'attribute' => 'inhouse',
            //     'value' => function($model){
            //         if($model->inhouse == 0){
            //                 return 'Attended';
            //         }else{
            //             return "Conducted";
            //         }

            //     }
            // ],
            // 'department.name',
            
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
