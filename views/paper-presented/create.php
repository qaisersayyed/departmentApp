<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaperPresented */

$this->title = 'Create Paper Presented';
$this->params['breadcrumbs'][] = ['label' => 'Paper Presenteds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-presented-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
