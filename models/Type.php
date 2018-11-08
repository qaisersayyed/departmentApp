<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property int $type_id
 * @property string $name
 * @property int $status
 *
 * @property PaperType[] $paperTypes
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 25],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'name' => 'Course Type',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaperTypes()
    {
        return $this->hasMany(PaperType::className(), ['type_id' => 'type_id']);
    }
}
