<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title =$model->faculty->name;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointment-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->appointment_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->appointment_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'appointment_id',
            'faculty.name',
            'Type',
            [
                'label' => 'Date of joining',
                'value' => function ($model) {
                    return date('d M Y', strtotime($model->date_of_joining));
                }
            ],
            [
                'label' => 'Date of leaving',
                'value' => function ($model) {
                    if ($model->date_of_leaving != null) {
                        return date('d M Y', strtotime($model->date_of_leaving));
                    } else {
                        return "Working";
                    }
                }
            ],
            'faculty.email',
            'faculty.phone_no',
            'faculty.address',
            'faculty.employee_id'

            

        ],
    ]) ?>

</div>
