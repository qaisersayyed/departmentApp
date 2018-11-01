<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaperType */


$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-type-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'paper_type_id',
            'paper.name',
            'paper.program.name',
            'paper.marks',
            'paper.credit',
            'type.name',
            'academicYear.year',
           // 'status',
        ],
    ]) ?>

</div>
