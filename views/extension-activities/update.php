<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExtensionActivities */

$this->title = 'Update Extension Activities: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Extension Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->extension_activities_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="extension-activities-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
