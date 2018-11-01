<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaperFaculty */

$this->title = 'Assign paper';
$this->params['breadcrumbs'][] = ['label' => 'Assign Papers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-faculty-create" style="width:50%">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
