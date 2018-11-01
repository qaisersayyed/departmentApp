<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'Add Appointment';
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-create" style="width:50%">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'faculty'=> $faculty, 
    ]) ?>

</div>
