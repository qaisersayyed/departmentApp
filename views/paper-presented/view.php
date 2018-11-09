<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPresented */

$this->title = $model->paper_title;
$this->params['breadcrumbs'][] = ['label' => 'Paper Presented', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-presented-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'paper_presented_id',
            //'paper_presented_file:ntext',
            'paper_title',
            'conference_name',
            'venue',
            [
                'label'=>' Date',
                'value'=>function($model){
                    return date('d M Y', strtotime($model->date));
                },
                'attribute' => 'date',
            ],
            //'created_at',
            //'updated_at',
            //'status',
        ],
    ]) ?>
    <a class="btn btn-default" href='<?= $model->paper_presented_file ?>'Download>Download file</a>
</div>
