<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramStudent */

$this->title = 'Update Admission';
$this->params['breadcrumbs'][] = ['label' => 'Program Students', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->program_student_id, 'url' => ['view', 'id' => $model->program_student_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="width:50%;" class="program-student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'student' => $student,
    ]) ?>

</div>
