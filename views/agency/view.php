<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Agency */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Agencies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agency-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'agency_id',
            'name',
        ],
    ]) ?>

</div>
