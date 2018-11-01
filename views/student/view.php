<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */


$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <?php foreach($model as $m){
        echo DetailView::widget([
            'model' => $m,
            'attributes' => [
                //'student_id',
                'student.name',
                'student.roll_no',
                'student.phone_no',
                'student.email',
                'program.name',
                'academicYear.year'
                //'created_at',
                //'updated_at',
                //'status',
               
            ],
        ]);
    } ?>

</div>
