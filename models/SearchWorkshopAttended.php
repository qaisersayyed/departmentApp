<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WorkshopAttended;

/**
 * SearchWorkshopAttended represents the model behind the search form of `app\models\WorkshopAttended`.
 */
class SearchWorkshopAttended extends WorkshopAttended
{
    public $to;
    public $from;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['workshop_attended_id', 'student_involved', 'student_name', 'academic_year'], 'integer'],
            [['description', 'file1', 'file2', 'file3', 'file4'], 'string'],
            [['workshop_title', 'start_date', 'end_date', 'participant_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = WorkshopAttended::find();

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

        if ($this->to != "" && $this->from != "") {
            $query->andFilterWhere(['between', 'start_date', $this->from, $this->to]);
        }

        $query->joinWith('academicYear');

        // grid filtering conditions
        $query->andFilterWhere([
            'workshop_attended_id' => $this->workshop_attended_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'student_involved' => $this->student_involved,
            'student_name' => $this->student_name,
            'academic_year' => $this->academic_year,
            'description' => $this->description,
            'file1' => $this->file1,
            'file2' => $this->file2,
            'file3' => $this->file3,
            'file4' => $this->file4,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'workshop_title', $this->workshop_title])
            ->andFilterWhere(['like', 'participant_name', $this->participant_name])
            ->andFilterWhere(['like', 'academic_year.year', $this->academic_year]);

        if (Yii::$app->user->identity->username != 'admin') {
            $query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }

        return $dataProvider;
    }
}
