<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuditingMember */

$this->title = 'Add Auditing Member';
$this->params['breadcrumbs'][] = ['label' => 'Auditing Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditing-member-create" style="width:50%">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
