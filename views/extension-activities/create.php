<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExtensionActivities */

$this->title = 'Create Extension Activities';
$this->params['breadcrumbs'][] = ['label' => 'Extension Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="width:50%;" class="extension-activities-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
