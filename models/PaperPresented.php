<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paper_presented".
 *
 * @property int $paper_presented_id
 * @property string $paper_presented_file
 * @property string $paper_title
 * @property string $conference_name
 * @property string $venue
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 */
class PaperPresented extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paper_presented';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paper_presented_id', 'paper_title', 'author', 'conference_name', 'venue', 'date', 'status','type', 'level', 'student_involved', 'paper_presented_file'], 'required'],
            [['paper_presented_id', 'status', 'level', 'user_id'], 'integer'],
            [['type', 'student_involved'], 'boolean'],
            [['paper_presented_file','paper_presented_file2','paper_presented_file3','paper_presented_file4'], 'file'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['author', 'description'], 'string'],
            [['paper_title', 'conference_name', 'venue', 'student_name'], 'string', 'max' => 250],
            [['paper_presented_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paper_presented_id' => 'Paper Presented ID',
            'paper_presented_file' => 'File 1',
            'paper_presented_file2' => 'File 2',
            'paper_presented_file3' => 'File 3',
            'paper_presented_file4' => 'File 4',
            'paper_title' => 'Paper Title',
            'author' => 'Author',
            'conference_name' => 'Conference Name',
            'venue' => 'Venue',
            'date' => 'Date',
            'type' => 'Paper Type',
            'level' => 'Level',
            'student_involved' => 'Were students involved ?',
            'student_name' => 'Student Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
}
