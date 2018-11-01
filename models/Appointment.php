<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property int $appointment_id
 * @property string $date_of_joining
 * @property string $date_of_leaving
 * @property int $faculty_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 *
 * @property Faculty $faculty
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_of_joining','Type'], 'required'],
            [['date_of_joining', 'date_of_leaving', 'created_at', 'updated_at'], 'safe'],
            [['faculty_id'], 'integer'],
            [['status'], 'string', 'max' => 1],
            [['faculty_id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['faculty_id' => 'faculty_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'appointment_id' => 'Appointment ID',
            'date_of_joining' => 'Date Of Joining',
            'date_of_leaving' => 'Date Of Leaving',
            'faculty_id' => 'Faculty',
            'Type'=>'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
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
