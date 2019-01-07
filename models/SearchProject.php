<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * SearchProject represents the model behind the search form of `app\models\Project`.
 */
class SearchProject extends Project
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;
    public function rules()
    {
        return [
            [['project_id', 'department_id', 'academic_year_id','agency_id'], 'integer'],
            [['approval_id', 'name', 'start_date', 'end_date',  'duration', 'faculty_name', 'student_name', 'created_at', 'updated_at'], 'safe'],
            [['amount'], 'number'],
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
        $query = Project::find();

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
            $query->andFilterWhere(['between', 'start_date', $this->from, $this->to]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'project_id' => $this->project_id,
            'amount' => $this->amount,
            'agency_id' => $this->agency_id,
            'department_id' => $this->department_id,
            'academic_year_id' => $this->academic_year_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'approval_id', $this->approval_id])
            ->andFilterWhere(['like', 'name', $this->name])
                       
            ->andFilterWhere(['like', 'duration', $this->duration])
            ->andFilterWhere(['like', 'faculty_name', $this->faculty_name])
            ->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date]);

        return $dataProvider;
    }
}
