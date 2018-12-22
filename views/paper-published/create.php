<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaperPublished */

$this->title = 'Add Paper Published';
$this->params['breadcrumbs'][] = ['label' => 'Paper Publisheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="width:50%;" class="paper-published-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
