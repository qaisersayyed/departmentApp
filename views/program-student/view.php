<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\StudentOrganization;
use app\models\StudentEducation;
/* @var $this yii\web\View */
/* @var $model app\models\ProgramStudent */

$this->title = 'Admission';
$this->params['breadcrumbs'][] = ['label' => 'Admission', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
 <?= Html::a(
    'Add Alumni Details',
    ['student-organization/create','p_id' => $model->program_id,'s_id' => $model->student_id],
    ['class' => 'btn btn-primary','Style' => 'float-right']
); ?>
<?= Html::a(
    'Add Student Education',
    ['student-education/create', 'program_id' => $model->program_id,'student_id' =>$model->student_id],
    ['class' => "btn btn-success", 'Style'=>"float:right"]
); ?>
<!-- <h1><?php //= Html::encode($this->title)?> <a Style="float:right" href="index.php?r=student-education/create" class="btn btn-success">
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
foreach ($stu as $s) {
    $cname =  $s->organization->company_name;
    $doj = $s->date_of_joining;
    $position = $s->position; ?>
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


<?php

$stu_edu= StudentEducation::find()->where(['student_id'=>$model->student_id])->all();
?>
<h4>Student Education Details</h4>
<?php
foreach ($stu_edu as $se) {
    $institution_name =  $se->institution_name;
    $degree = $se->degree;
    $doj = $se->date_of_joining;
     ?>
<div>
<table class="table table-striped table-bordered">
  <tbody>
    <tr>
     
      <td><b>Institution Name</b> </td>
      <td><?php echo $institution_name ?></td>
     
    </tr>
    <tr>
     
     <td><b>Degree</b> </td>
     <td><?php echo $degree ?></td>
    
   </tr>
    <tr>
     
      <td><b> Date of joining</b></td>
      <td><?php echo Yii::$app->formatter->asDate($doj); ?></td>
     
    </tr>

    
  </tbody>
</table>
</div>
<br>

<?php
}
?>