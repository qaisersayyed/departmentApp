<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaperType */

$this->title = 'Add Course';
$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'paper' => $paper,
    ]) ?>

</div>
