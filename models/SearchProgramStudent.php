<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProgramStudent;

/**
 * SearchProgramStudent represents the model behind the search form of `app\models\ProgramStudent`.
 */
class SearchProgramStudent extends ProgramStudent
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;
    public $roll_no;
    public $alumni;
    public function rules()
    {
        return [
            [['program_student_id', 'user_id'], 'integer'],
            [['created_at', 'updated_at', 'status', 'program_id','student_id', 'academic_year_id'], 'safe'],
            
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
        $query = ProgramStudent::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'program_student_id' => 'SORT_DESC'
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith('program');
        $query->joinWith('student');
        $query->joinWith('academicYear');

        if ($this->roll_no != "") {
            $query->andFilterWhere(['like', 'student.roll_no', $this->roll_no]);
        }
        if ($this->alumni != "") {
            if ($this->alumni == 1) {
                $query->andFilterWhere(['student.alumni' => 1]);
            } else {
                $query->andFilterWhere(['student.alumni' => 0]);
            }
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'program_student_id' => $this->program_student_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
           //'student.roll_no'=> $this.roll_no,
            'program_student.status'=>1,
        ]);
        $query->andFilterWhere(['like', 'program.name', $this->program_id]);
        $query->andFilterWhere(['like', 'student.name', $this->student_id]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);
        if(yii::$app->user->identity->username != 'admin'){
            $query->andFilterWhere(['program_student.user_id' => Yii::$app->user->id]);
        }
        return $dataProvider;
    }
}
