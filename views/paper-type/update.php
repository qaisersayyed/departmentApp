<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaperType */

$this->title = 'Update Course';
$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paper_type_id, 'url' => ['view', 'id' => $model->paper_type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paper-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'paper' => $paper,
    ]) ?>

</div>
