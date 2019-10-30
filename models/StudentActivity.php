<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_activity".
 *
 * @property int $student_activity_id
 * @property string $name
 * @property double $budget
 * @property string $start_date
 * @property string $end_date
 * @property string $faculty_name
 * @property string $student_name
 * @property int $department_id
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 * @property Department $department
 */
class StudentActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'budget', 'start_date', 'end_date', 'faculty_name', 'student_name', 'department_id', 'academic_year_id','faculty_id'], 'required'],
            [['activity_file','activity_file2','activity_file3', 'activity_file4'], 'file'],
            [['budget'], 'number'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['faculty_name', 'student_name', 'description'], 'string'],
            [['department_id', 'academic_year_id','faculty_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'faculty_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_activity_id' => 'Student Activity ID',
            'activity_file' => 'File 1',
            'activity_file2' => 'File 2',
            'activity_file3' => 'File 3',
            'activity_file4' => 'File 4',
            'name' => 'Activity Name',
            'budget' => 'Budget',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'faculty_id' => 'Faculty Coordinator',
            'faculty_name' => 'Other Faculty Coordinators',
            'student_name' => 'Student Coordinator',
            'department_id' => 'Department Name',
            'academic_year_id' => 'Academic Year ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicYear()
    {
        return $this->hasOne(AcademicYear::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }
}
