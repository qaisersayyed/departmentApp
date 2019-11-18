<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faculty".
 *
 * @property int $faculty_id
 * @property string $name
 * @property string $email
 * @property string $phone_no
 * @property string $address
 * @property string $employee_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 *
 * @property Appointment[] $appointments
 * @property PaperFaculty[] $paperFaculties
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone_no', 'address', 'employee_id'], 'required'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['email', 'employee_id'], 'string', 'max' => 50],
            [['phone_no'], 'string', 'max' => 15],
            [['status'], 'string', 'max' => 1],
            [['user_id'],'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'faculty_id' => 'Faculty ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'address' => 'Address',
            'employee_id' => 'Employee ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['faculty_id' => 'faculty_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaperFaculties()
    {
        return $this->hasMany(PaperFaculty::className(), ['faculty_id' => 'faculty_id']);
    }
}
