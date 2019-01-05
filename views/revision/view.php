<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Revision */

$this->title = $model->syllabus_file;
$this->params['breadcrumbs'][] = ['label' => 'Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revision-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'revision_id',
            //'syllabus_file:ntext',
            'syllabus_date',
            'program.name',
            'paper.name',
            //'created_at',
            //'updated_at',
            //'status',
            'academicYear.year',
           
        ],
    ]) ?>
    <?php if ($model->syllabus_file){?>
        <a class="btn btn-default" href='<?= $model->syllabus_file ?>'Download>Download Syllabus File1</a>
    <?php } ?>
    <?php if ($model->syllabus_file2){?>
        <a class="btn btn-default" href='<?= $model->syllabus_file2 ?>'Download>Download Syllabus File2</a>
    <?php }  ?>
    <?php if ($model->syllabus_file3){?>
        <a class="btn btn-default" href='<?= $model->syllabus_file3 ?>'Download>Download Syllabus File3</a>
    <?php } ?>
    <?php if ($model->syllabus_file4){?>
        <a class="btn btn-default" href='<?= $model->syllabus_file4 ?>'Download>Download Syllabus File4</a>
    <?php }  ?>
    

</div>
