<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academic_year".
 *
 * @property int $academic_year_id
 * @property string $year
 *
 * @property AuditingMember[] $auditingMembers
 * @property Bos[] $bos
 * @property Event[] $events
 * @property Examiner[] $examiners
 * @property PaperFaculty[] $paperFaculties
 * @property PaperType[] $paperTypes
 * @property ProgramStudent[] $programStudents
 * @property Project[] $projects
 * @property Revision[] $revisions
 * @property Seminar[] $seminars
 * @property StudentActivity[] $studentActivities
 * @property SubjectExpert[] $subjectExperts
 * @property Workshop[] $workshops
 */
class AcademicYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'academic_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'required'],
            [['year'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'academic_year_id' => 'Academic Year ID',
            'year' => 'Year',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditingMembers()
    {
        return $this->hasMany(AuditingMember::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBos()
    {
        return $this->hasMany(Bos::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExaminers()
    {
        return $this->hasMany(Examiner::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaperFaculties()
    {
        return $this->hasMany(PaperFaculty::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaperTypes()
    {
        return $this->hasMany(PaperType::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramStudents()
    {
        return $this->hasMany(ProgramStudent::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisions()
    {
        return $this->hasMany(Revision::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminars()
    {
        return $this->hasMany(Seminar::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentActivities()
    {
        return $this->hasMany(StudentActivity::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectExperts()
    {
        return $this->hasMany(SubjectExpert::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasMany(Workshop::className(), ['academic_year_id' => 'academic_year_id']);
    }
}
