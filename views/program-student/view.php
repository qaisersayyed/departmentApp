<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\StudentOrganization;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramStudent */

$this->title = 'Admission';
$this->params['breadcrumbs'][] = ['label' => 'Admission', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a(
            'Add Student Education',
            ['student-education/create', 'program_id' => $model->program_id,'student_id' =>$model->student_id],
            ['class' => "btn btn-success", 'Style'=>"float:right"]
        ); ?>
<!-- <h1><? //= Html::encode($this->title) ?> <a Style="float:right" href="index.php?r=student-education/create" class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span> Add Student Education</a></h1> -->
<div class="program-student-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'program_student_id',
            'program.name',
            'student.name',
            'student.roll_no',
            'student.phone_no',
            'student.email',
           // 'created_at',
           // 'updated_at',
           // 'status',
            'academicYear.year',
        ],
    ]) ?>

</div>


<?php 

$stu= StudentOrganization::find()->where(['student_id'=>$model->student_id])->all();
?>
<h4>Alumni Details</h4>
<?php
foreach($stu as $s){
        $cname =  $s->organization->company_name;
         $doj = $s->date_of_joining;
        $position = $s->position;

?>
<div>
<table class="table table-striped table-bordered">
  <tbody>
    <tr>
     
      <td><b>Company Name</b> </td>
      <td><?php echo $cname ?></td>
     
    </tr>
    <tr>
     
      <td><b> Date of joining</b></td>
      <td><?php echo $doj ?></td>
     
    </tr>

    <tr>
     
     <td><b>Position</b> </td>
     <td><?php echo $position ?></td>
    
   </tr>
  </tbody>
</table>
</div>
<br>

<?php 

}
?>