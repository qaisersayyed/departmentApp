<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bos".
 *
 * @property int $bos_id
 * @property string $program
 * @property string $minutes
 * @property string $date
 * @property int $department_id
 * @property int $academic_year_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AcademicYear $academicYear
 * @property Department $department
 */
class Bos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['program', 'minutes', 'date', 'department_id', 'academic_year_id'], 'required'],
            [['minutes'], 'file'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['department_id', 'academic_year_id'], 'integer'],
            [['revision'], 'boolean'],
            [['description'], 'string'],
            [['program'], 'string', 'max' => 100],
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
            'bos_id' => 'Bos ID',
            'program' => 'Program',
            'minutes' => 'Minutes',
            'date' => 'Date',
            'department_id' => 'Department',
            'academic_year_id' => 'Academic Year',
            'description' => 'Description',
            'revision' => 'Revision',
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
