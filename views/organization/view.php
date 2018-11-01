<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Organization */

$this->title = $model->company_name;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-view">

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'organization_id',
            'company_name',
            'contact_no',
            //'created_at',
           // 'updated_at',
        ],
    ]) ?>

</div>
