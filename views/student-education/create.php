<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentEducation */

$this->title = 'Higher Education';
$this->params['breadcrumbs'][] = ['label' => 'Student Educations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-education-create">

    <?= $this->render('_form', [
        'model' => $model,
        'program_id' => $program_id,
        'student_id' => $student_id
    ]) ?>

</div>
