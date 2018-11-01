<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Revision */

$this->title = 'Add Revision';
$this->params['breadcrumbs'][] = ['label' => 'Revisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revision-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
