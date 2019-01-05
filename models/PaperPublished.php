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
            [['paper_title', 'journal_name', 'date','file'], 'required'],
            [['file1','file2','file3','file4'],'file'],
            [['created_at', 'updated_at'], 'safe'],
            [['file'], 'string'],
            [['paper_title', 'journal_name'], 'string', 'max' => 100],
            [['date'], 'string', 'max' => 20],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            //'file' => 'File',
        ];
    }
}
