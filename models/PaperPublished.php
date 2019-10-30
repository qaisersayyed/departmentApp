<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paper_published".
 *
 * @property int $paper_published_id
 * @property string $paper_title
 * @property string $journal_name
 * @property string $year
 * @property string $month
 * @property string $created_at
 * @property string $updated_at
 * @property string $file
 */
class PaperPublished extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paper_published';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paper_title', 'journal_name', 'date', 'file1'], 'required'],
            [['co_author', 'description'], 'string'],
            [['file1','file2','file3','file4'],'file'],
            [['created_at', 'updated_at'], 'safe'],
            [['paper_title', 'journal_name'], 'string', 'max' => 100],
            [['date'], 'string', 'max' => 20],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'faculty_id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paper_published_id' => 'Paper Published ID',
            'paper_title' => 'Paper Title',
            'journal_name' => 'Journal Name',
            'date' => 'Date',
            'faculty_id' => 'Author',
            'co_author' => 'Co-author',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFaculty()
    {
        return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    }
}
