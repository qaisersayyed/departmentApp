<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Event;

/**
 * SearchEvent represents the model behind the search form of `app\models\Event`.
 */
class SearchEvent extends Event
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;
    
    public function rules()
    {
        return [
            [['event_id'], 'integer'],
            [['name', 'venue', 'inhouse', 'participant', 'participant_name', 'faculty_coordinator', 'student_coordinator', 'start_date', 'end_date', 'created_at', 'updated_at', 'department_id', 'academic_year_id','faculty_id'], 'safe'],
            [['cost'], 'number'],
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
        $query = Event::find();

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

        $query->joinWith('academicYear');
        $query->joinWith('department');
        $query->joinWith('faculty');

        // grid filtering conditions

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'start_date', $this->from, $this->to]);
        }


        $query->andFilterWhere([
            'event_id' => $this->event_id,
            'cost' => $this->cost,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        if($this->inhouse){
            if($this->inhouse[0] == "n"){
                $this->inhouse = 0;
            }else{
                $this->inhouse = 1;
            }
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'venue', $this->venue])
            ->andFilterWhere(['like', 'inhouse', $this->inhouse])
            ->andFilterWhere(['like', 'participant', $this->participant])
            ->andFilterWhere(['like', 'participant_name', $this->participant])
            ->andFilterWhere(['like', 'faculty_coordinator', $this->faculty_coordinator])
            ->andFilterWhere(['like', 'student_coordinator', $this->student_coordinator]);
        $query->andFilterWhere(['like', 'department.name', $this->department_id]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);
        $query->andFilterWhere(['like', 'faculty.name', $this->faculty_id]);
    

        return $dataProvider;
    }
}
