<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentOrganization */

$this->title = 'Update Alumni';
$this->params['breadcrumbs'][] = ['label' => 'Student Organizations', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->student_organization_id, 'url' => ['view', 'id' => $model->student_organization_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div style="width:50%;" class="student-organization-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
