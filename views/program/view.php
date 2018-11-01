<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Program */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-view">

  

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'program_id',
            'name',
            'department.name',
            //'created_at',
            //'updated_at',
            //'status',
        ],
    ]) ?>

</div>
