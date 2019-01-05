<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examiner".
 *
 * @property int $examiner_id
 * @property string $name
 * @property string $faculty_name
 * @property string $venue
 * @property string $start_date
 * @property string $end_date
 * @property int $department_id
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 * @property Department $department
 */
class Examiner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'examiner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'faculty_name', 'venue', 'start_date', 'end_date', 'department_id', 'academic_year_id'], 'required'],
            [['file1','file2','file3','file4'],'file'],
            [['faculty_name'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['department_id', 'academic_year_id'], 'integer'],
            [['name', 'venue'], 'string', 'max' => 50],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'examiner_id' => 'Examiner ID',
            'name' => 'Examination Detail',
            'faculty_name' => 'Faculty Name',
            'venue' => 'Venue',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'department_id' => 'Department',
            'academic_year_id' => 'Academic Year',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'file' => 'File'
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
}
