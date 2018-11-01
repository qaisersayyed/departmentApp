<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property int $program_id
 * @property string $name
 * @property int $department_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 *
 * @property Paper[] $papers
 * @property Department $department
 * @property ProgramStudent[] $programStudents
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'department_id'], 'required'],
            [['department_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 1],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'program_id' => 'Program',
            'name' => 'Program',
            'department_id' => 'Department Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPapers()
    {
        return $this->hasMany(Paper::className(), ['program_id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramStudents()
    {
        return $this->hasMany(ProgramStudent::className(), ['program_id' => 'program_id']);
    }
}
