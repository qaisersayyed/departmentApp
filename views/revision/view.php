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
    <a class="btn btn-default" href='<?= $model->syllabus_file ?>'Download>Download Syllabus</a>

</div>
