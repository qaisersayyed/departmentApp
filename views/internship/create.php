<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Internship */

$this->title = 'Add Internship';
$this->params['breadcrumbs'][] = ['label' => 'Internships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="internship-create" style="width:50%">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
