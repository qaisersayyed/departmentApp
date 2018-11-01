<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bos */

$this->title = 'Update Bos';
$this->params['breadcrumbs'][] = ['label' => 'Bos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->program, 'url' => ['view', 'id' => $model->bos_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="width:50%;" class="bos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
