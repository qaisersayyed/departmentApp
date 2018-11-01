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
            [['speaker_name', 'start_date', 'end_date', 'participant', 'venue', 'inhouse', 'department_id', 'academic_year_id'], 'required'],
            [['speaker_name', 'participant'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['department_id', 'academic_year_id'], 'integer'],
            [['venue'], 'string', 'max' => 50],
            [['inhouse'], 'string', 'max' => 1],
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
            'speaker_name' => 'Speaker Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'participant' => 'Participant',
            'venue' => 'Venue',
            'inhouse' => 'Inhouse',
            'department_id' => 'Department',
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
}
