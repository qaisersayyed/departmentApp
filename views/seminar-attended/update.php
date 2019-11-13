<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeminarAttended */

$this->title = 'Update Seminar Attended: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Seminar Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->seminar_attended_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seminar-attended-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
