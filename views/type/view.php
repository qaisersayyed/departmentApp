<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Type */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'type_id',
            'name',
            //'status',
        ],
    ]) ?>

</div>
