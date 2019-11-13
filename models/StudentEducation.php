<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_education".
 *
 * @property int $student_education_id
 * @property string $institution_name
 * @property string $degree
 * @property string $date_of_joining
 * @property string $created_at
 * @property string $updated_at
 */
class StudentEducation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['program_id','student_id','institution_name', 'degree', 'date_of_joining'], 'required'],
            [['institution_name'], 'string'],
            [['date_of_joining', 'created_at', 'updated_at'], 'safe'],
            [['degree'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'program_id'=> 'Program Name',
            'student_id'=> 'Student Name',
            'student_education_id' => 'Student Education ID',
            'institution_name' => 'Institution Name',
            'degree' => 'Degree',
            'date_of_joining' => 'Date Of Joining',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
