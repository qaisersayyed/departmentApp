<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property int $department_id
 * @property string $name
 *
 * @property AuditingMember[] $auditingMembers
 * @property Bos[] $bos
 * @property Event[] $events
 * @property Examiner[] $examiners
 * @property Program[] $programs
 * @property Project[] $projects
 * @property Seminar[] $seminars
 * @property StudentActivity[] $studentActivities
 * @property SubjectExpert[] $subjectExperts
 * @property Workshop[] $workshops
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'name' => 'Department',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditingMembers()
    {
        return $this->hasMany(AuditingMember::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBos()
    {
        return $this->hasMany(Bos::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExaminers()
    {
        return $this->hasMany(Examiner::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrograms()
    {
        return $this->hasMany(Program::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeminars()
    {
        return $this->hasMany(Seminar::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentActivities()
    {
        return $this->hasMany(StudentActivity::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectExperts()
    {
        return $this->hasMany(SubjectExpert::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkshops()
    {
        return $this->hasMany(Workshop::className(), ['department_id' => 'department_id']);
    }
}
