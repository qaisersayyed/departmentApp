<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_expert".
 *
 * @property int $subject_expert_id
 * @property string $faculty_name
 * @property int $department_id
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 * @property Department $department
 */
class SubjectExpert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_expert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_name', 'department_id', 'academic_year_id'], 'required'],
            [['department_id', 'academic_year_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['faculty_name'], 'string', 'max' => 40],
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
            'subject_expert_id' => 'Subject Expert ID',
            'faculty_name' => 'Faculty Name',
            'department_id' => 'Department ',
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
