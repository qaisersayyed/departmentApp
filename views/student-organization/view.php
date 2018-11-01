<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentOrganization */

$this->title = $model->organization->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Alumni', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-organization-view">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'student_organization_id',
            'organization.company_name',
            'student.name',
            [
                'label' => 'Date Of Joining',
                'value' => function($model){
                    return date('d M Y', strtotime($model->date_of_joining));
                }
            ],
            'position',
            //'created_at',
           // 'updated_at',
        ],
    ]) ?>

</div>
