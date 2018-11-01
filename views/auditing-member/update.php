<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuditingMember */

$this->title = 'Update Auditing Member';
$this->params['breadcrumbs'][] = ['label' => 'Auditing Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->auditing_member_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auditing-member-update" style="width:50%">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
