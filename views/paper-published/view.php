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
            [
                'label' => 'Author',
                'attribute' => 'faculty',    
            ],
            [
                'label' => 'Indexed in UGC Care List',
                'attribute' => 'dgc_flag', 
                'value' => $model->dgc_flag == 0 ? 'False' : 'True',   
            ],
            [
                'label' => 'UGC Number',
                'attribute' => 'ugc_no',    
            ],
            [
                'label' => 'H Index of Author',
                'attribute' => 'h_index_author',    
            ],

            [
                'label' => 'Group',
                'attribute' => 'group',    
            ],
            [
                'label' => 'ISBN/ISSN',
                'attribute' => 'isbn',    
            ],
            [
                'label' => 'Doi Link',
                'attribute' => 'doi_link',    
            ],
            [
                'label' => 'H Index of Author',
                'attribute' => 'h_index_author',    
            ],
            [
                'label' => 'H Index of Journal',
                'attribute' => 'h_index_journal',    
            ],
            [
                'label' => 'Institutional Affiliation',
                'attribute' => 'institute_affiliation',    
            ],
            [
                'label' => 'Orcid Number',
                'attribute' => 'orcid',    
            ],
            
        
            // 'co_auther',
            'description'
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
