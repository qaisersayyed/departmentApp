<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Workshop */

$this->title = 'Update Workshop Conducted';
$this->params['breadcrumbs'][] = ['label' => 'Workshops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->workshop_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="width:50%;" class="workshop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
