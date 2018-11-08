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

<h4>Alumni Details</h4>
<?php 

$stu= StudentOrganization::find()->where(['student_id'=>$model->student_id])->all();
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

<?php 

}
?>