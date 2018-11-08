<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaperPresented */

$this->title = $model->paper_presented_id;
$this->params['breadcrumbs'][] = ['label' => 'Paper Presenteds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-presented-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->paper_presented_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->paper_presented_id], [
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

</div>
