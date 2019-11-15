<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Examiner;

/**
 * SearchExaminer represents the model behind the search form of `app\models\Examiner`.
 */
class SearchExaminer extends Examiner
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;

    public function rules()
    {
        return [
            [['examiner_id'], 'integer'],
            [['name', 'faculty_id', 'faculty_name', 'venue', 'start_date', 'end_date', 'created_at', 'updated_at', 'academic_year_id'], 'safe'],
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
        $query = Examiner::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if youp do not want to return any records when validation fails
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
            'examiner_id' => $this->examiner_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);


        $query->andFilterWhere(['like', 'examiner.name', $this->name])
            ->andFilterWhere(['like', 'faculty_name', $this->faculty_name])
            ->andFilterWhere(['like', 'venue', $this->venue]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);
        $query->andFilterWhere(['like', 'faculty.name', $this->faculty_id]);

        if(Yii::$app->user->identity->username != 'admin'){
            $query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }

        return $dataProvider;
    }
}
