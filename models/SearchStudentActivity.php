<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentActivity;

/**
 * SearchStudentActivity represents the model behind the search form of `app\models\StudentActivity`.
 */
class SearchStudentActivity extends StudentActivity
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;
    public function rules()
    {
        return [
            [['student_activity_id', 'department_id', 'academic_year_id'], 'integer'],
            [['name','upload_file', 'start_date', 'end_date', 'faculty_name', 'student_name', 'created_at', 'updated_at'], 'safe'],
            [['budget'], 'number'],
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
        $query = StudentActivity::find();

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
            'student_activity_id' => $this->student_activity_id,
            'budget' => $this->budget,
            'department_id' => $this->department_id,
            'academic_year_id' => $this->academic_year_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'faculty_name', $this->faculty_name])
            ->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date]);

        return $dataProvider;
    }
}
