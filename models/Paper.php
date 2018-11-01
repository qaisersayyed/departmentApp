<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paper".
 *
 * @property int $paper_id
 * @property string $name
 * @property int $program_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 *
 * @property Program $program
 * @property PaperFaculty[] $paperFaculties
 * @property PaperType[] $paperTypes
 * @property Revision[] $revisions
 */
class Paper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name',], 'required'],
            [['program_id','credit','marks'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['status'], 'string', 'max' => 1],
            [['program_id'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['program_id' => 'program_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paper_id' => 'Paper ID',
            'name' => ' Course Name',
            'program_id' => 'Program Name',
            'credit'=>'Credit',
            'marks'=>'Marks',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['program_id' => 'program_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaperFaculties()
    {
        return $this->hasMany(PaperFaculty::className(), ['paper_id' => 'paper_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaperTypes()
    {
        return $this->hasMany(PaperType::className(), ['paper_id' => 'paper_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisions()
    {
        return $this->hasMany(Revision::className(), ['paper_id' => 'paper_id']);
    }
}
