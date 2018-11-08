<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPresented */

$this->title = 'Update Paper Presented: ' . $model->paper_presented_id;
$this->params['breadcrumbs'][] = ['label' => 'Paper Presenteds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paper_presented_id, 'url' => ['view', 'id' => $model->paper_presented_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paper-presented-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
