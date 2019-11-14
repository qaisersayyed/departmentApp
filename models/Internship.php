<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "internship".
 *
 * @property int $internship_id
 * @property int $program_id
 * @property int $student_id
 * @property int $academic_year
 * @property string $company
 * @property string $start_date
 * @property string $end_date
 * @property double $hours
 * @property string $file
 *
 * @property AcademicYear $academicYear
 * @property Program $program
 * @property Student $student
 */
class Internship extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'internship';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id', 'student_id', 'academic_year_id', 'company', 'start_date', 'end_date', 'hours'], 'required'],
            [['program_id', 'student_id', 'academic_year_id'], 'integer'],
            [['start_date', 'end_date', 'user_id','file', 'file1', 'file2', 'file3'], 'safe'],
            [['hours'], 'number'],
            [['description'], 'string'],
            [['file', 'file1', 'file2', 'file3'], 'file'],
            [['company'], 'string', 'max' => 255],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['program_id' => 'program_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'student_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'internship_id' => 'Internship ID',
            'program_id' => 'Program name',
            'student_id' => 'Student name',
            'academic_year_id' => 'Academic Year',
            'company' => 'Company',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'hours' => 'Hours',
            'description' => 'Description',
            'file' => 'File1',
            'file1' => 'File2',
            'file2' => 'File3',
            'file3' => 'File4',
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
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['program_id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['student_id' => 'student_id']);
    }
}
