<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'department_id',
            'name',
        ],
    ]) ?>

</div>
