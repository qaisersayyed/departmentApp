<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SeminarAttended;

/**
 * SearchSeminarAttended represents the model behind the search form of `app\models\SeminarAttended`.
 */
class SearchSeminarAttended extends SeminarAttended
{
    /**
     * {@inheritdoc}
     */
    public $to;
    public $from;
    public function rules()
    {
        return [
            [['seminar_attended_id', 'student_present', 'user_id'], 'integer'],
            [['title','type', 'start_date', 'end_date', 'level', 'attendee', 'attended_as', 'student_name', 'file1', 'file2', 'file3', 'file4', 'created_at', 'updated_at'], 'safe'],
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
        $query = SeminarAttended::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['seminar_attended_id'=>SORT_DESC]],
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
            'seminar_attended_id' => $this->seminar_attended_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'student_present' => $this->student_present,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
               -> andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'attendee', $this->attendee])
            ->andFilterWhere(['like', 'attended_as', $this->attended_as])
            ->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'file1', $this->file1])
            ->andFilterWhere(['like', 'file2', $this->file2])
            ->andFilterWhere(['like', 'file3', $this->file3])
            ->andFilterWhere(['like', 'file4', $this->file4]);

        
        if(yii::$app->user->identity->username != 'admin'){
            $query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }
        return $dataProvider;
    }
}
