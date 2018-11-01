<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Examiner */

$this->title = 'Add Examiner';
$this->params['breadcrumbs'][] = ['label' => 'Examiners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="width:50%;" class="examiner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
