<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SubjectExpert */

$this->title = $model->faculty_id;
$this->params['breadcrumbs'][] = ['label' => 'Subject Experts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-expert-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'subject_expert_id',
            'faculty.name',
            // 'department.name',
            'academicYear.year',
            'description',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
