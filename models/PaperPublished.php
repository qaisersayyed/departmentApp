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
            [['paper_title', 'journal_name', 'date','faculty'], 'required'],
            [['description','group','isbn','doi_link','h_index_journal','h_index_author','institute_affiliation'], 'string'],
            [['file1','file2','file3','file4'],'file'],
            [['created_at', 'updated_at'], 'safe'],
            [['dgc_flag'], 'boolean'],
            [['user_id'], 'integer'],
            [['paper_title', 'journal_name'], 'string', 'max' => 100],
            [['faculty',], 'string', 'max' => 257],
            [['date'], 'string', 'max' => 20],
            //[['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'faculty_id']]
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
            'faculty' => 'Author',
            'isbn' => 'ISBN',
            'doi_link' => 'Doi Link',
            'h_index_journal' => 'H Index of Journal',
            'h_index_author' => 'H Index of Author',
            'institute_affiliation' => 'Institutional Affiliation',
            'group'=>'Group',
            'dgc_flag'=>'Indexed in UGC Care List',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getFaculty()
    // {
    //     return $this->hasOne(Faculty::className(), ['faculty_id' => 'faculty_id']);
    // }
}
