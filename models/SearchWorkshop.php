<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workshop;

/**
 * SearchWorkshop represents the model behind the search form of `app\models\Workshop`.
 */
class SearchWorkshop extends Workshop
{
    /**
     * @inheritdoc
     */

    public $to;
    public $from;

    public function rules()
    {
        return [
            [['workshop_id', 'male_count', 'female_count'], 'integer'],
            [['name', 'participant','participant_name', 'faculty_name', 'start_date', 'end_date', 'created_at', 'updated_at', 'academic_year_id','faculty_id','sponsor'], 'safe'],
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
        $query = Workshop::find();

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
        $query->joinWith('faculty');

        // grid filtering conditions

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'start_date', $this->from, $this->to]);
        }
        
        $query->andFilterWhere([
            'workshop_id' => $this->workshop_id,
            'cost' => $this->cost,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);


        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'participant', $this->participant])
            ->andFilterWhere(['like', 'faculty_name', $this->faculty_name])
            ->andFilterWhere(['like', 'sponsor', $this->sponsor])
            ->andFilterWhere(['like', 'participant_name', $this->participant_name])
            ->andFilterWhere(['like', 'male_count', $this->male_count])
            ->andFilterWhere(['like', 'female_count', $this->female_count]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);
        $query->andFilterWhere(['like', 'faculty.name', $this->faculty_id]);

        return $dataProvider;
    }
}
