<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paper_type".
 *
 * @property int $paper_type_id
 * @property int $paper_id
 * @property int $type_id
 * @property int $academic_year_id
 *
 * @property AcademicYear $academicYear
 * @property Paper $paper
 * @property Type $type
 */
class PaperType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paper_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paper_type_id', 'paper_id', 'type_id', 'academic_year_id'], 'integer'],
            [['paper_type_id'], 'unique'],
            [['academic_year_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicYear::className(), 'targetAttribute' => ['academic_year_id' => 'academic_year_id']],
            [['paper_id'], 'exist', 'skipOnError' => true, 'targetClass' => Paper::className(), 'targetAttribute' => ['paper_id' => 'paper_id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'type_id']],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paper_type_id' => 'Paper Type ID',
            'paper_id' => 'Course Name',
            'type_id' => 'Course Type',
            'academic_year_id' => 'Academic Year ',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicYear()
    {
        return $this->hasOne(AcademicYear::className(), ['academic_year_id' => 'academic_year_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaper()
    {
        return $this->hasOne(Paper::className(), ['paper_id' => 'paper_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['type_id' => 'type_id']);
    }
}
