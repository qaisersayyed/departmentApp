<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EventsAttended;

/**
 * SearchEventsAttended represents the model behind the search form of `app\models\EventsAttended`.
 */
class SearchEventsAttended extends EventsAttended
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_attended_id', 'student_involved', 'user_id'], 'integer'],
            [['title', 'start_date', 'end_date', 'participants', 'students', 'file1', 'file2', 'file3', 'file4', 'created_at', 'updated_at'], 'safe'],
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
        $query = EventsAttended::find();

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
            'event_attended_id' => $this->event_attended_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'student_involved' => $this->student_involved,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'participants', $this->participants])
            ->andFilterWhere(['like', 'students', $this->students])
            ->andFilterWhere(['like', 'file1', $this->file1])
            ->andFilterWhere(['like', 'file2', $this->file2])
            ->andFilterWhere(['like', 'file3', $this->file3])
            ->andFilterWhere(['like', 'file4', $this->file4]);

        return $dataProvider;
    }
}
