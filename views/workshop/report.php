<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use practically\chartjs\Chart;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Workshop */

//$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'report', 'url' => ['report']];
$this->params['breadcrumbs'][] = $this->title;

$form = ActiveForm::begin([
    'method' => 'GET',
]); ?>
    <div class="row">
        <div class="col-md-3">
            <p>From Date: </p>
        <?= DatePicker::widget([
            'name' => 'from',
            'template' => '{addon}{input}',

            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'minViewMode' => 'months',
            ]
        ]); ?>
        </div>
        <div class="col-md-3">
        <p>To Date: </p>
        <?= DatePicker::widget([
            'name' => 'to',
            'template' => '{addon}{input}',

            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'minViewMode' => 'months',
            ]
        ]); ?>
        </div>
        <div class="col-md-3" style="padding:29px 0px 0px 20px;">
            <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
            
        </div>
    </div>
 <?php ActiveForm::end(); ?>

<script src="Chart.js"></script>

<canvas id="myChart" style="position: relative; height:40vh; width:80vw"></canvas>
<script>
var ctx = document.getElementById('myChart');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($month) ?>,
        datasets: [{
            label: 'conducted',
            data: <?php echo json_encode($conducted) ?>,
            backgroundColor: 'orange',
          
            borderWidth: 1
        },
        {
            label: 'attended',
            data: <?php echo json_encode($attended) ?>,
            backgroundColor: 'yellow',
           
            borderWidth: 1
        }]
    },
   
    options: {
        
        title: {
            display: true,
            text: 'Workshops'
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        
    }
});
</script>




