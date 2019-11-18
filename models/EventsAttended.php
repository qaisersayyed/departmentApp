<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events_attended".
 *
 * @property int $event_attended_id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property string $participants
 * @property int $student_involved
 * @property string $students
 * @property string $file1
 * @property string $file2
 * @property string $file3
 * @property string $file4
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_id
 */
class EventsAttended extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events_attended';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'start_date', 'participants', 'user_id'], 'required'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['participants', 'students', 'file1', 'file2', 'file3', 'file4'], 'string'],
            [['student_involved', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_attended_id' => 'Event Attended ID',
            'title' => 'Title',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'participants' => 'Participants',
            'student_involved' => 'Student Involved',
            'students' => 'Students',
            'file1' => 'File1',
            'file2' => 'File2',
            'file3' => 'File3',
            'file4' => 'File4',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }
}
