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
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
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
            [['name', 'faculty_id', 'venue', 'start_date', 'end_date', 'academic_year_id'], 'required'],
            [['file1','file2','file3','file4'],'file'],
            [['faculty_name', 'description'], 'string'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['academic_year_id','faculty_id', 'user_id'], 'integer'],
            [['name', 'venue'], 'string', 'max' => 50],
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
            'examiner_id' => 'Examiner ID',
            'name' => 'Examination Detail',
            'faculty_id' => 'Faculty Name',
            'faculty_name' => 'Other Faculty Names',
            'venue' => 'Venue',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'academic_year_id' => 'Academic Year',
            'description' => 'Description',
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
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }
}
