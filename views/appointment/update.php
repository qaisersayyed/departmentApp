<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'Update Appointment';
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->appointment_id, 'url' => ['view', 'id' => $model->appointment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appointment-update" style="width:50%">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'faculty' =>$faculty,
    ]) ?>

</div>
