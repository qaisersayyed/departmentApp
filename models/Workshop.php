<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workshop".
 *
 * @property int $workshop_id
 * @property string $name
 * @property double $cost
 * @property string $participant
 * @property string $faculty_name
 * @property string $start_date
 * @property string $end_date
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 */
class Workshop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workshop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'cost', 'participant','faculty_id', 'faculty_name', 'start_date', 'end_date', 'academic_year_id'], 'required'],
            [['file1','file2','file3','file4'],'file'],
            [['cost'], 'number'],
            [['faculty_name','sponsor','paticipant_name', 'description'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['faculty_id', 'academic_year_id', 'participant', 'male_count', 'female_count'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'faculty_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'workshop_id' => 'Workshop ID',
            'name' => 'Workshop Title',
            'cost' => 'Cost',
            'participant' => 'Participant Count',
            'participant_name' => 'Participant Name',
            'male_count' => 'No. of male',
            'female_count' => 'No. of female',
            'description' => 'Description',
            'faculty_id' => 'Faculty Coordinator',
            'faculty_name' => 'Other Faculty Coordinators',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'academic_year_id' => 'Academic Year',
            'sponsor'=> 'Sponsor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'file' => 'File',
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
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }
}
