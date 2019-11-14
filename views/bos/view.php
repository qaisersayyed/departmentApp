<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bos */

$this->title = $model->program;
$this->params['breadcrumbs'][] = ['label' => 'Bos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bos-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'bos_id',
            'program',
            [
                'label' => 'Date',
                
                'value' => function ($model) {
                    return date('d M Y', strtotime($model->date));
                }
            ],

            [
                'label' => 'Revision',
                'attribute' => 'revision',
                'value' => function ($dataProvider) {
                    if ($dataProvider->revision == 1) {
                        return 'Revised';
                    } else {
                        return "Not Revised";
                    }
                }
            ],
            'academicYear.year',
            'description',
            'minutes:ntext',

            //'created_at',
            //'updated_at',
        ],
    ]) ?>
    <a class="btn btn-default" href='<?= $model->minutes ?>'Download>Download minutes file</a>

</div>
