<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkshopAttended */

$this->title = 'Create Workshop Attended';
$this->params['breadcrumbs'][] = ['label' => 'Workshop Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workshop-attended-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
