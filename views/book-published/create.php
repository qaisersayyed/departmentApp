<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BookPublished */

$this->title = 'Create Book Published';
$this->params['breadcrumbs'][] = ['label' => 'Book Publisheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-published-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
