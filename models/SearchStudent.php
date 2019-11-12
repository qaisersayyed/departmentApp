<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;
use app\models\ProgramStudent;

/**
 * SearchStudent represents the model behind the search form of `app\models\Student`.
 */
class SearchStudent extends Student
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;
    public function rules()
    {
        return [
            [['roll_no'], 'unique'],
            [['student_id'], 'integer'],
            [['name', 'phone_no', 'created_at', 'updated_at', 'status','email'], 'safe'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Student::find()->where(['status'=>1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'academic_year.year', $this->from, $this->to]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'student_id' => $this->student_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status'=>1,
            'user_id' => Yii::$app->user->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'roll_no', $this->roll_no])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
