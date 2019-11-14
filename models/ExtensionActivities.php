<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "extension_activities".
 *
 * @property int $extension_activities_id
 * @property string $title
 * @property string $organising_unit
 * @property int $contact_no
 * @property int $teacher_no
 * @property int $student_no
 * @property int $participant_no
 * @property string $type
 * @property string $teachers
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 * @property string $is_awarded
 * @property int $male
 * @property int $female
 * @property string $file1
 * @property string $file2
 * @property string $file3
 * @property string $file4
 * @property int $user_id
 * @property string $scheme_name
 * @property string $created_at
 * @property string $updated_at
 */
class ExtensionActivities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extension_activities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'organising_unit', 'contact_no', 'teacher_no', 'student_no', 'type', 'teachers', 'user_id'], 'required'],
            [['organising_unit', 'teachers', 'description', 'file1', 'file2', 'file3', 'file4'], 'string'],
            [['contact_no', 'teacher_no', 'student_no', 'participant_no', 'male', 'female', 'user_id'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 50],
            [['is_awarded'], 'string', 'max' => 60],
            [['scheme_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'extension_activities_id' => 'Extension Activities ID',
            'title' => 'Title',
            'organising_unit' => 'Organising Unit',
            'contact_no' => 'Contact No',
            'teacher_no' => 'Teacher No',
            'student_no' => 'Student No',
            'participant_no' => 'Participant No',
            'type' => 'Type',
            'teachers' => 'Teachers',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'description' => 'Description',
            'is_awarded' => 'Sponsor/Funded',
            'male' => 'Male Count',
            'female' => 'Female Count',
            'file1' => 'File1',
            'file2' => 'File2',
            'file3' => 'File3',
            'file4' => 'File4',
            'user_id' => 'User ID',
            'scheme_name' => 'Scheme Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
