<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Internship */

$this->title = $model->student->name;
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
    <a class="btn btn-default" href='<?= $model->file ?>' Download>Download File</a>


</div>
