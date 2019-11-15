<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeminarAttended */

$this->title = 'Add Seminars/Workshop/Conference Attended';
$this->params['breadcrumbs'][] = ['label' => 'Seminar Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seminar-attended-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
