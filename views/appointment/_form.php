<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Faculty;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>
    <br>
    <?= $form->field($faculty, 'name')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'date_of_joining')->widget(
    DatePicker::className(),
    [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'clearBtn' => true,
            ]
    ]
);?>
    <br>
    <?= $form->field($model, 'date_of_leaving')->widget(
        DatePicker::className(),
        [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'clearBtn' => true,
        ]
    ]
    );?>
    <br>
    
    <?= $form->field($faculty, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($faculty, 'phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($faculty, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($faculty, 'employee_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'Type')->dropDownList(
        [ 'lecture bases'=>'Lecture bases', 'contract '=>'Contract','permanent'=>'Permanent','junior programmer'=>'Junior Programmer']
    )
        ?>
    <br>
    <?php
            $id= Yii::$app->user->id;
            echo $form->field($model, 'user_id')->hiddenInput(['value' => $id])->label(false);
        ?>
    
   
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
