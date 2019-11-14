<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_published".
 *
 * @property int $book_published_id
 * @property string $book_title
 * @property string $author
 * @property string $edited_volume
 * @property string $date
 * @property string $publisher
 * @property string $isbn
 * @property int $student_involved
 * @property string $student_name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $file1
 * @property int $file2
 * @property int $file3
 * @property int $file4
 */
class BookPublished extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_published';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_title', 'author', 'date', 'student_involved', 'created_at', 'file1'], 'required'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['student_involved'], 'integer'],
            [['description', 'file1', 'file2', 'file3', 'file4'], 'string'],
            [['book_title', 'author', 'edited_volume', 'publisher', 'student_name'], 'string', 'max' => 250],
            [['isbn'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_published_id' => 'Book Published ID',
            'book_title' => 'Book Title',
            'author' => 'Author',
            'edited_volume' => 'Edited Volume',
            'date' => 'Date',
            'publisher' => 'Publisher',
            'isbn' => 'Isbn',
            'student_involved' => 'Student Involved',
            'student_name' => 'Student Name',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'file1' => 'File1',
            'file2' => 'File2',
            'file3' => 'File3',
            'file4' => 'File4',
        ];
    }
}
