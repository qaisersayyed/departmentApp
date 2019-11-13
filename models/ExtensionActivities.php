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
 * @property string $teachers
 * @property string $date
 * @property string $description
 * @property int $is_awarded
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
            [['title', 'organising_unit', 'contact_no', 'teacher_no', 'student_no', 'teachers', 'date'], 'required'],
            [['organising_unit', 'teachers', 'description'], 'string'],
            [['contact_no', 'teacher_no', 'student_no'], 'integer'],
            [['date','user_id' ,'created_at', 'updated_at', 'is_awarded'], 'safe'],
            [['title'], 'string', 'max' => 100],
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
            'organising_unit' => 'Organising Unit/Agency/Collaborating Agency',
            'contact_no' => 'Contact No',
            'teacher_no' => 'No. of teacher',
            'student_no' => 'No. of student ',
            'teachers' => 'Teachers',
            'date' => 'Date',
            'description' => 'Description',
            'is_awarded' => 'Is awarded by govt.',
            'scheme_name' => 'Name of scheme',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
