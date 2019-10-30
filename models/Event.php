<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $event_id
 * @property string $name
 * @property string $venue
 * @property int $inhouse
 * @property double $cost
 * @property string $participant
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
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'venue', 'inhouse', 'cost','student_coordinator', 'faculty_coordinator','faculty_id', 'start_date', 'end_date', 'department_id', 'academic_year_id'], 'required'],
            [['file1','file2','file3','file4'],'file'],
            [['cost'], 'number'],
            [['faculty_coordinator','student_coordinator', 'participant_name', 'description'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['department_id', 'academic_year_id', 'faculty_id', 'participant'], 'integer'],
            [['name', 'venue'], 'string', 'max' => 50],
            [['inhouse'], 'string', 'max' => 1],
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
            'event_id' => 'Event ID',
            'name' => 'Event Title',
            'venue' => 'Venue',
            'inhouse' => 'Event Type',
            'cost' => 'Cost',
            'participant' => 'Participant Count',
            'participant_name' => 'Participant Name',
            'description' => 'Description',
            'faculty_id' => 'Faculty Coordinator',
            'faculty_coordinator' => 'Other Faculty Coordinators',
            'student_coordinator' => 'Student Coordinator',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'department_id' => 'Department Name',
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
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }
}
