<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BookPublished */

$this->title = $model->book_published_id;
$this->params['breadcrumbs'][] = ['label' => 'Book Publisheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-published-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->book_published_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->book_published_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'book_published_id',
            'book_title',
            'author',
            'edited_volume',
            'date',
            'publisher',
            'isbn',
            'student_involved',
            'student_name',
            'description:ntext',
            'created_at',
            'updated_at',
            'file1:ntext',
            'file2',
            'file3',
            'file4',
        ],
    ]) ?>

<?php if ($model->file1){ ?>
        <a class="btn btn-default" href='<?= $model->file1 ?>'Download>Download file1</a>
    <?php } ?>
    <?php if ($model->file2){ ?>
        <a class="btn btn-default" href='<?= $model->file2 ?>'Download>Download file2</a>
    <?php } ?>
    <?php if ($model->file3){ ?>
        <a class="btn btn-default" href='<?= $model->file3 ?>'Download>Download file3</a>
    <?php } ?>
    <?php if ($model->file4){ ?>
        <a class="btn btn-default" href='<?= $model->file4 ?>'Download>Download file4</a>
    <?php } ?>

</div>
