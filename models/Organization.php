<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $organization_id
 * @property string $company_name
 * @property string $contact_no
 * @property string $created_at
 * @property string $updated_at
 *
 * @property StudentOrganization[] $studentOrganizations
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'contact_no'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['company_name'], 'string', 'max' => 50],
            [['contact_no'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'organization_id' => 'Organization ID',
            'company_name' => 'Company Name',
            'contact_no' => 'Contact No',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentOrganizations()
    {
        return $this->hasMany(StudentOrganization::className(), ['organization_id' => 'organization_id']);
    }
}
