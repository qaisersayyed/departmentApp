<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventsAttended */

$this->title = 'Create Events Attended';
$this->params['breadcrumbs'][] = ['label' => 'Events Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="width:50%;" class="events-attended-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
