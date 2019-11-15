<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventsAttended */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events Attendeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="events-attended-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'event_attended_id',
            'title',
            'start_date',
            'end_date',
            'participants:ntext',
           // 'student_involved',
             [
                'label' => 'Student Involved ',
                'value' => function ($dataProvider) {
                    if ($dataProvider->student_involved == 0) {
                        return 'No';
                    } else {
                        return "Yes";
                    }
                },
                'attribute' => 'student_involved',
            ],
            'students:ntext',
          //  'file1:ntext',
          //  'file2:ntext',
          //  'file3:ntext',
          //  'file4:ntext',
         //   'created_at',
           // 'updated_at',
           // 'user_id',
        ],
    ]) ?>

<?php if ($model->file1) {?>
        <a class="btn btn-default" href='<?= $model->file1 ?>'Download>Download file1</a>
    <?php } ?>
    <?php if ($model->file2) {?>
        <a class="btn btn-default" href='<?= $model->file2 ?>'Download>Download file2</a>
    <?php }  ?>
    <?php if ($model->file3) {?>
        <a class="btn btn-default" href='<?= $model->file3 ?>'Download>Download file3</a>
    <?php } ?>
    <?php if ($model->file4) {?>
        <a class="btn btn-default" href='<?= $model->file4 ?>'Download>Download file4</a>
    <?php }  ?>
        

</div>
