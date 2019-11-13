<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workshop_attended".
 *
 * @property int $workshop_attended_id
 * @property string $workshop_title
 * @property string $start_date
 * @property string $end_date
 * @property string $participant_name
 * @property int $student_involved
 * @property int $student_name
 * @property int $academic_year
 * @property int $description
 * @property int $file1
 * @property int $file2
 * @property int $file3
 * @property int $file4
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 */
class WorkshopAttended extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workshop_attended';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workshop_title', 'start_date', 'end_date', 'participant_name', 'student_involved', 'academic_year', 'file1', 'created_at'], 'required'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['academic_year', 'file1', 'file2', 'file3', 'file4'], 'integer'],
            [['student_involved'], 'boolean'],
            [['description', 'file1', 'file2', 'file3', 'file4'], 'string'],
            [['workshop_title'], 'string', 'max' => 150],
            [['participant_name'], 'string', 'max' => 250],
            [['student_name'], 'string', 'max' => 250],
            [['academic_year'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year' => 'academic_year_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'workshop_attended_id' => 'Workshop Attended ID',
            'workshop_title' => 'Workshop Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'participant_name' => 'Participant Name',
            'student_involved' => 'Student Involved',
            'student_name' => 'Student Name',
            'academic_year' => 'Academic Year',
            'description' => 'Description',
            'file1' => 'File1',
            'file2' => 'File2',
            'file3' => 'File3',
            'file4' => 'File4',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicYear()
    {
        return $this->hasOne(AcademicYear::className(), ['academic_year_id' => 'academic_year']);
    }
}
