<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkshopAttended */

$this->title = 'Update Workshop Attended: ' . $model->workshop_attended_id;
$this->params['breadcrumbs'][] = ['label' => 'Workshop Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->workshop_attended_id, 'url' => ['view', 'id' => $model->workshop_attended_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="workshop-attended-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
