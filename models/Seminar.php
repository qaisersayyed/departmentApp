<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seminar".
 *
 * @property int $seminar_id
 * @property string $speaker_name
 * @property string $start_date
 * @property string $end_date
 * @property string $participant
 * @property string $venue
 * @property int $inhouse
 * @property int $department_id
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 * @property Department $department
 */
class Seminar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seminar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','conducted_type','type','faculty_attended','no_of_female','no_of_male', 'start_date', 'end_date', 'participant', 'venue', 'level', 'department_id', 'academic_year_id'], 'required'],
            [['file1','file2','file3','file4'],'file'],
            [['title','participant_name', 'faculty_attended','faculty_organizer', 'description'], 'string'],
            [['start_date','conducted_type', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['department_id','user_id', 'academic_year_id','no_of_female','no_of_male', 'participant'], 'integer'],
            [['venue'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 50],
            [['faculty_organizer'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 100],
            [['conducted_type'], 'string', 'max' => 100],
            [['level'], 'string', 'max' => 50],
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
            'seminar_id' => 'Seminar ID',
            'type' => 'Type',
            'title' => 'Title',
            'conducted_type'=>'Seminar Type',
            // 'speaker_name' => 'Speaker Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'participant' => 'Participant Count',
            'participant_name' => 'Participant Name',
            'faculty_organizer' => 'Faculty Cordinator',
            'faculty_attended' => 'Faculty Attended',
            'venue' => 'Venue',
            'level' =>'Level',
            'no_of_female' => 'No of Female',
            'no_of_male' => 'No of male',
            // 'inhouse' => 'Seminar Type',
            // 'department_id' => 'Department',
            'academic_year_id' => 'Academic Year',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            //'file' => 'File',
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
