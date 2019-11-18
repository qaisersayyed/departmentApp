<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Internship;

/**
 * SearchInternship represents the model behind the search form of `app\models\Internship`.
 */
class SearchInternship extends Internship
{
    /**
     * {@inheritdoc}
     */
    public $to;
    public $from;
    public function rules()
    {
        return [
            [['internship_id'], 'integer'],
            [['start_date','user_id' ,'end_date', 'file','file1','file2','file3', 'program_id', 'student_id', 'academic_year_id', 'company'], 'safe'],
            [['hours'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Internship::find();

        // add conditions that should always apply here

        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['internship_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->joinWith("student");
        $query->joinWith("program");
        $query->joinWith("academicYear");


        if ($this->to != "" && $this->from != "") {
            $query->andFilterWhere(['between', 'academic_year.year', $this->from, $this->to]);
        }

       
        // grid filtering conditions
        $query->andFilterWhere([
            'internship_id' => $this->internship_id,
            //'program_id' => $this->program_id,
            //'student_id' => $this->student_id,
            //'academic_year' => $this->academic_year,
            'company' => $this->company,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'hours' => $this->hours,
        ]);

        $query->andFilterWhere(['like', 'file', $this->file]);
        $query->andFilterWhere(['like', 'file1', $this->file1]);
        $query->andFilterWhere(['like', 'file2', $this->file2]);
        $query->andFilterWhere(['like', 'file3', $this->file3]);
        $query->andFilterWhere(['like', 'company', $this->company]);
        $query->andFilterWhere(['like', 'program.name', $this->program_id]);
        $query->andFilterWhere(['like', 'student.name', $this->student_id]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);
        if (Yii::$app->user->identity->username != 'admin') {
            $query->andFilterWhere(['internship.user_id' => Yii::$app->user->id ]);
        }

        return $dataProvider;
    }
}
