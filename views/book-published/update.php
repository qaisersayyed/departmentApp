<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BookPublished */

$this->title = 'Update Book Published: ' . $model->book_published_id;
$this->params['breadcrumbs'][] = ['label' => 'Book Publisheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->book_published_id, 'url' => ['view', 'id' => $model->book_published_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="book-published-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
