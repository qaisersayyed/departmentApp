<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ExtensionActivities */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Extension Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="extension-activities-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'extension_activities_id',
            'title',
            'organising_unit:ntext',
            'type',
            'contact_no',
            'teacher_no',
            'student_no',
            'teachers:ntext',
            'participant_no',
            'start_date',
            'end_date',
            'male',
            'female',
            'description:ntext',
            'is_awarded',
            'scheme_name',
        //    'created_at',
        //    'updated_at',
        ],
    ]) ?>
 <?php if ($model->file1) {
        echo "<h2>File 1</h2>"?>
        
        <a class="btn btn-default" href='<?= $model->file1 ?>' Download>Download File 1</a>
    <?php
    } ?>
    <?php if ($model->file2) {
        echo "<br><h2>File 2</h2>" ?>
        <a class="btn btn-default" href='<?= $model->file2 ?>' Download>Download File 2</a>
        <?php
    } ?>
    <?php if ($model->file3) {
        echo "<h2>File 3</h2>" ?>
        <a class="btn btn-default" href='<?= $model->file3 ?>' Download>Download File 3</a>
        <?php
    } ?>
    <?php if ($model->file4) {
        echo "<h2>File 4</h2>" ?> 
        <a class="btn btn-default" href='<?= $model->file4 ?>' Download>Download File 4</a>
  
        <?php
    } ?>

</div>
