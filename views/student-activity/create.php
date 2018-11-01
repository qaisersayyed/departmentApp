<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentActivity */

$this->title = 'Add Student Activity';
$this->params['breadcrumbs'][] = ['label' => 'Student Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-activity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
