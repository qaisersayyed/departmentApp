<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\StudentOrganization;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramStudent */

$this->title = 'Admission';
$this->params['breadcrumbs'][] = ['label' => 'Admission', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-student-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'program_student_id',
            'program.name',
            'student.name',
            'student.roll_no',
            'student.phone_no',
            'student.email',
           // 'created_at',
           // 'updated_at',
           // 'status',
            'academicYear.year',
        ],
    ]) ?>

</div>
