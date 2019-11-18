<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Seminar */

$this->title = 'Update Seminar/Workshop/Conference conducted';
$this->params['breadcrumbs'][] = ['label' => 'Seminars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->seminar_id, 'url' => ['view', 'id' => $model->seminar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="width:50%;" class="seminar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
