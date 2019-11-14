<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentEducation */

$this->title = 'Update Student Education: ' . $model->student_education_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_education_id, 'url' => ['view', 'id' => $model->student_education_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-education-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
