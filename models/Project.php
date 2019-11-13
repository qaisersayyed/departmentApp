<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $project_id
 * @property string $approval_id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $agency_name
 * @property string $duration
 * @property double $amount
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
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'start_date', 'end_date', 'duration', 'amount', 'faculty_name', 'student_name', 'department_id', 'academic_year_id','faculty_id'], 'required'],
            [['project_file','project_file2','project_file3','project_file4'], 'file'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
            [['faculty_name', 'student_name', 'description'], 'string'],
            [['department_id','user_id', 'academic_year_id','agency_id','faculty_id'], 'integer'],
            [['approval_id'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 100],
            [['duration'], 'string', 'max' => 50],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            // [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
            [['agency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Agency::className(), 'targetAttribute' => ['agency_id' => 'agency_id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'faculty_id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'project_id' => 'Project ID',
            'approval_id' => 'Approval ID',
            'project_file' => 'Project File1',
            'project_file2' => 'Project File2',
            'project_file3' => 'Project File3',
            'project_file4' => 'Project File4',
            'name' => 'Project Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'agency_id' => 'Agency Name',
            'duration' => 'Duration',
            'amount' => 'Amount',
            'faculty_id' => 'Faculty Name',
            'faculty_name' => 'Other Faculty Names',
            'student_name' => 'Student Name',
            // 'department_id' => 'Department Name',
            'academic_year_id' => 'Academic Year',
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
    public function getAgency()
    {
        return $this->hasOne(Agency::className(), ['agency_id' => 'agency_id']);

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);

    }
}
