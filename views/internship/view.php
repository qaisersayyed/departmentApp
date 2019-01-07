<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Internship */

//$this->title = $model->student->name;
$this->params['breadcrumbs'][] = ['label' => 'Internships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="internship-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'internship_id',
            'program.name',
            'student.name',
            'academicYear.year',
            'company',
            'start_date',
            'end_date',
            'hours',
            //'file:ntext',
        ],
    ]) ?>
    
    
    <?php if ($model->file ){ ?>
        <a class="btn btn-default" href='<?= $model->file ?>' Download>Download File 1</a>
    <?php } ?>
    <?php if ($model->file1 ){ ?>
        <a class="btn btn-default" href='<?= $model->file1 ?>' Download>Download File 2</a>
        <?php } ?>
    <?php if ($model->file2 ){ ?>
        <a class="btn btn-default" href='<?= $model->file2 ?>' Download>Download File 3</a>
        <?php } ?>
    <?php if ($model->file3 ){ ?> 
        <a class="btn btn-default" href='<?= $model->file3 ?>' Download>Download File 4</a>
  
        <?php } ?>


</div>