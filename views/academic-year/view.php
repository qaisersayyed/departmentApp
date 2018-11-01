<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicYear */

$this->title = $model->year;
$this->params['breadcrumbs'][] = ['label' => 'Academic Years', 'url' => ['index']];

?>
<div class="academic-year-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'academic_year_id',
            'year',
        ],
    ]) ?>

</div>
