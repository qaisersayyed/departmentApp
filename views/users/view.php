<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'password',
            'department_name',
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
