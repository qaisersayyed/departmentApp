<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "revision".
 *
 * @property int $revision_id
 * @property string $syllabus_file
 * @property string $syllabus_date
 * @property int $program_id
 * @property int $paper_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 * @property int $academic_year_id
 *
 * @property AcademicYear $academicYear
 * @property Paper $paper
 * @property Program $program
 */
class Revision extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'revision';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'syllabus_date', 'program_id', 'paper_id'], 'required'],
            [['syllabus_file','syllabus_file2','syllabus_file3','syllabus_file4'], 'file'],
            [['syllabus_date', 'created_at', 'updated_at'], 'safe'],
            [['program_id', 'user_id','paper_id', 'status', 'academic_year_id'], 'integer'],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            [['paper_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paper::className(), 'targetAttribute' => ['paper_id' => 'paper_id']],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['program_id' => 'program_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'revision_id' => 'Revision ID',
            'syllabus_file' => 'Syllabus File 1',
            'syllabus_file2' => 'Syllabus File 2',
            'syllabus_file3' => 'Syllabus File 3',
            'syllabus_file4' => 'Syllabus File 4',
            'syllabus_date' => 'Syllabus Date',
            'program_id' => 'Program Name',
            'paper_id' => 'Course Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'academic_year_id' => 'Academic Year',
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
    public function getPaper()
    {
        return $this->hasOne(Paper::className(), ['paper_id' => 'paper_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['program_id' => 'program_id']);
    }
}
