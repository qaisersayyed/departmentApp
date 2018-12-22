<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPublished */

$this->title = 'Update Paper Published';
$this->params['breadcrumbs'][] = ['label' => 'Paper Publisheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->paper_published_id, 'url' => ['view', 'id' => $model->paper_published_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="width:50%;" class="paper-published-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
