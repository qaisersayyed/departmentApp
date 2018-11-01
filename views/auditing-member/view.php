<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AuditingMember */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auditing Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditing-member-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a('Update', ['update', 'id' => $model->auditing_member_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->auditing_member_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'auditing_member_id',
            'name',
            [
                'label' => 'Start Date',
                'attribute'=>'start_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->start_date));
                }
            ],
            [
                'label' => 'End Date',
                'attribute'=>'end_date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->end_date));
                }
            ],
            'college_name:ntext',
            'program',
            'faculty_name:ntext',
            'department.name',
            'academicYear.year',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div>
