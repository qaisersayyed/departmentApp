<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seminar_attended".
 *
 * @property int $seminar_id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property string $level
 * @property string $attendee
 * @property string $attended_as
 * @property int $student_present
 * @property string $student_name
 * @property int $user_id
 * @property string $file1
 * @property string $file2
 * @property string $file3
 * @property string $file4
 * @property string $created_at
 * @property string $updated_at
 */
class SeminarAttended extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seminar_attended';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_date', 'end_date', 'attendee', 'attended_as', 'student_present', 'user_id'], 'required'],
            [['start_date','type', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['attendee', 'student_name', 'file1', 'file2', 'file3', 'file4'], 'string'],
            [['student_present','seminar_attended_id', 'user_id'], 'integer'],
            [['title', 'attended_as'], 'string', 'max' => 100],
            [['level'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'seminar_attended_id' => 'Seminar Attended ID',
            'type' => 'Type',
            'title' => 'Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'level' => 'Level',
            'attendee' => 'Attendee',
            'attended_as' => 'Attended As',
            'student_present' => 'Student Present',
            'student_name' => 'Student Name',
            'user_id' => 'User ID',
            'file1' => 'File1',
            'file2' => 'File2',
            'file3' => 'File3',
            'file4' => 'File4',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
