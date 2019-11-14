<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\WorkshopAttended */

$this->title = $model->workshop_attended_id;
$this->params['breadcrumbs'][] = ['label' => 'Workshop Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workshop-attended-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->workshop_attended_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->workshop_attended_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'workshop_attended_id',
            'workshop_title',
            'start_date',
            'end_date',
            'participant_name',
            'student_involved',
            'student_name',
            'academicYear.year',            
            'description',
            'file1',
            'file2',
            'file3',
            'file4',
            // 'created_at',
            // 'updated_at',
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
