<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Upload extends Model
{
    public $file;
    public $pid;
    public $aid;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['file', 'pid','aid'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Select Csv File ',
            'aid' => 'Academic Year ',
            'pid' => 'Program ',
            
        ];
    }


   
}
