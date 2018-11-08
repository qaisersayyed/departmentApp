<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaperFaculty;

/**
 * SearchPaperFaculty represents the model behind the search form of `app\models\PaperFaculty`.
 */
class SearchPaperFaculty extends PaperFaculty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paper_faculty_id',], 'integer'],
            [['program_id','paper_id', 'faculty_id', 'academic_year_id','created_at', 'updated_at'], 'safe'],
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
        $query = PaperFaculty::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'paper_faculty_id' => $this->paper_faculty_id,
            //'paper_id' => $this->paper_id,
            //'faculty_id' => $this->faculty_id,
            //'academic_year_id' => $this->academic_year_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->andFilterWhere(['like', 'faculty.name', $this->faculty_id])
              ->andFilterWhere(['like', 'academicYear.year', $this->academic_year_id])
              ->andFilterWhere(['like', 'paper.name', $this->paper_id])
              ->andFilterWhere(['like', 'program.name', $this->program_id]);

        return $dataProvider;
    }
}
