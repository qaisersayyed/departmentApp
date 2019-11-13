<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seminar;

/**
 * SearchSeminar represents the model behind the search form of `app\models\Seminar`.
 */

class SearchSeminar extends Seminar
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;

    public function rules()
    {
        return [
            [['seminar_id','user_id'], 'integer'],
            [['conducted_type','level', 'start_date', 'end_date', 'participant', 'venue', 'created_at', 'updated_at', 'department_id', 'academic_year_id','participant_name', 'faculty_organizer','faculty_attended','no_of_female','no_of_male'], 'safe'],
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
        $query = Seminar::find();

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

        // grid filtering conditions

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'start_date', $this->from, $this->to]);
        }

        $query->andFilterWhere([
            'seminar_id' => $this->seminar_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'no_of_female' => $this->no_of_female,
            'no_of_male' => $this->no_of_male,
        ]);
        // $query->andFilterWhere(['like',$this->conducted_type, 'conducted_type']);
        //     if($this->conducted_type){
        //         if($this->conducted_type== 'Intellectual Property Right'){
        //             $this->conducted_type = 1;
        //         }
        //         elseif($this->conducted_type== "Industry Association"){
        //             $this->conducted_type  = 2;
        //         }
        //         elseif($this->conducted_type== "Workshop"){
        //             $this->conducted_type = 3;
        //         }
        //         elseif($this->conducted_type== "Seminar"){
        //             $this->conducted_type = 4;
        //         }
        //         elseif($this->conducted_type=="Environment Related"){
        //             $this->conducted_type =  5;
        //         }
        //         elseif($this->conducted_type== "Gender"){
        //             $this->conducted_type =  6;
        //         }
        //         elseif($this->conducted_type== "Women Empowerment"){
        //             $this->conducted_type  = 7;
        //         }
        // }

        if($this->level){
            if($this->level== "National Level"){
                $this->level = 1;
            }
            elseif($this->level== "State Level"){
                $this->level  = 2;
            }
            elseif($this->level== "Local Level"){
                $this->level = 3;
            }
            elseif($this->level== "International Level"){
                $this->level = 4;
            }
        }
        // if($this->inhouse){
        //     if($this->inhouse[0] == "a"){
        //         $this->inhouse = 0;
        //     }else{
        //         $this->inhouse = 1;
        //     }
        // }


        $query->andFilterWhere(['like', 'participant', $this->participant])
            ->andFilterWhere(['like', 'participant_name', $this->participant_name])
            ->andFilterWhere(['like', 'faculty_organizer', $this->faculty_organizer])
            ->andFilterWhere(['like', 'faculty_attended', $this->faculty_attended])
            ->andFilterWhere(['like', 'venue', $this->venue]);
            

        $query->andFilterWhere(['like', 'conducted_type', $this->conducted_type]);
        $query->andFilterWhere(['like', 'level', $this->level]);
        
        $query->andFilterWhere(['like', 'department.name', $this->department_id]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);

        if(yii::$app->user->identity->username != 'admin'){
            $query->andFilterWhere(['seminar.user_id' => Yii::$app->user->id]);
        }
        return $dataProvider;
        
    }
}
