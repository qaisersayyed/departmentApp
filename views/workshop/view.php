<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Workshop */

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Workshops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'workshop_id',
            'name',
            [
                'label' => 'Workshop Type',
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
            'faculty_name:ntext',
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
   <?php if ($model->file1){ ?>
        <a class="btn btn-default" href='<?= $model->file1 ?>'Download>Download file1</a>
    <?php } ?>
    <?php if ($model->file2){ ?>
        <a class="btn btn-default" href='<?= $model->file2 ?>'Download>Download file2</a>
    <?php } ?>
    <?php if ($model->file3){ ?>
        <a class="btn btn-default" href='<?= $model->file3 ?>'Download>Download file3</a>
    <?php } ?>
    <?php if ($model->file4){ ?>
        <a class="btn btn-default" href='<?= $model->file4 ?>'Download>Download file4</a>
    <?php } ?>
</div>
