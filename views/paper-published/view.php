<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPublished */

//$this->title = $model->paper_published_id;
$this->params['breadcrumbs'][] = ['label' => 'Paper Publisheds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-published-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'paper_published_id',
            'paper_title',
            'journal_name',
            [
                'label' => 'Date',
                'attribute' => 'date',
                'value' => function($model){
                    return date('d M Y', strtotime($model->date));
                }

            ],
            //'created_at',
            //'updated_at',
            
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
