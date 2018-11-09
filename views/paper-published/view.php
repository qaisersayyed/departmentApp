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
            'file:ntext',
        ],
    ]) ?>
    <a class="btn btn-default" href='<?= $model->paper_presented_file ?>'>Download file</a>
</div>
