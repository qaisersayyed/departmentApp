<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paper_faculty".
 *
 * @property int $paper_faculty_id
 * @property int $paper_id
 * @property int $faculty_id
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 * @property Faculty $faculty
 * @property Paper $paper
 */
class PaperFaculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $program_id;
    public static function tableName()
    {
        return 'paper_faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paper_id', 'faculty_id', 'academic_year_id', 'program_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'faculty_id']],
            [['paper_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paper::className(), 'targetAttribute' => ['paper_id' => 'paper_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paper_faculty_id' => 'Paper Faculty ID',
            'paper_id' => 'Paper ',
            'faculty_id' => 'Faculty ',
            'academic_year_id' => 'Academic Year ',
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
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaper()
    {
        return $this->hasOne(Paper::className(), ['paper_id' => 'paper_id']);
    }
}
