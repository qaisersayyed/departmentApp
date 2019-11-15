<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventsAttended */

$this->title = 'Update Events Attended: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->event_attended_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="events-attended-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
