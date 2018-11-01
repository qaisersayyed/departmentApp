
<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\searchType */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Type';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-index">

<h1 ><?= Html::encode($this->title) ?>
<a style="float:right" href="index.php?r=type/create" class="btn btn-success">
<span  class="glyphicon glyphicon-plus"></span> Add Type</a>

</h1>

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

            //'type_id',
            'name',
            //'status',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'pjax'=>true,
        'showPageSummary'=>false,
        'panel'=>[
            
            'heading'=> $this->title,
           
        ]
    ]); ?>
</div>
