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
                'label' => 'Revision of structure',
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
           // 'minutes:ntext',

            //'created_at',
            //'updated_at',
        ],
    ]) ?>
    <?php if ($model->file1 ){ echo "<h2>File 1</h2>"?>
        
        <a class="btn btn-default" href='<?= $model->file1 ?>' Download>Download File 1</a>
    <?php } ?>
    <?php if ($model->file2 ){ echo "<br><h2>File 2</h2>" ?>
        <a class="btn btn-default" href='<?= $model->file2 ?>' Download>Download File 2</a>
        <?php } ?>
    <?php if ($model->file3 ){  echo "<h2>File 3</h2>" ?>
        <a class="btn btn-default" href='<?= $model->file3 ?>' Download>Download File 3</a>
        <?php } ?>
    <?php if ($model->file4 ){  echo "<h2>File 4</h2>" ?> 
        <a class="btn btn-default" href='<?= $model->file4 ?>' Download>Download File 4</a>
  
        <?php } ?>

</div>
