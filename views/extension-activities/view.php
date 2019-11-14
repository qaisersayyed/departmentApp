<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ExtensionActivities */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Extension Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="extension-activities-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'extension_activities_id',
            'title',
            'organising_unit:ntext',
            'contact_no',
            'teacher_no',
            'student_no',
            'teachers:ntext',
            'date',
            'description:ntext',
            [
                'label' => 'Awarded by govt.',
                'value' => function ($dataProvider) {
                    if ($dataProvider->is_awarded == 0) {
                        return 'No';
                    } else {
                        return "Yes";
                    }
                },
                'attribute' => 'is_awarded',
            ],
        
            'scheme_name',
        //    'created_at',
        //    'updated_at',
        ],
    ]) ?>

</div>
