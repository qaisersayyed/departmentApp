<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchExtensionActivities */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Extension Activities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="extension-activities-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Create Extension Activities', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'autoXlFormat'=>true,
        'export'=>[
        'label' => 'Export',
        'fontAwesome'=>true,
        'showConfirmAlert'=>false,
        'target'=>GridView::TARGET_BLANK
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'extension_activities_id',
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
            //'created_at',
            //'updated_at',
            //'sponsor:ntext',
            //'created_at',
            //'updated_at',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            
            'heading'=> $this->title,
           
        ]
    ]); ?>
    
    ?>
</div>
