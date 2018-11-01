<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Faculties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-view">

    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'faculty_id',
            'name',
            'email:email',
            'phone_no',
            'address:ntext',
            'employee_id',
            //'created_at',
            //'updated_at',
            //'status',
        ],
    ]) ?>

</div>
