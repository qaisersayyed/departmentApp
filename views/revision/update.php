<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Revision */

$this->title = 'Update Revision';
$this->params['breadcrumbs'][] = ['label' => 'Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->revision_id, 'url' => ['view', 'id' => $model->revision_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="revision-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
