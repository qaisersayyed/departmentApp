<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Internship */

$this->title = $model->student->name;
$this->params['breadcrumbs'][] = ['label' => 'Internships', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->internship_id, 'url' => ['view', 'id' => $model->internship_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="Update Internship">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
