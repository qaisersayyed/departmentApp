<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExtensionActivities;

/**
 * SearchExtensionActivities represents the model behind the search form of `app\models\ExtensionActivities`.
 */
class SearchExtensionActivities extends ExtensionActivities
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['extension_activities_id', 'contact_no', 'teacher_no', 'student_no'], 'integer'],
            [['title','type','start_date','end_date','male','female','participant_no ','organising_unit','user_id' ,'teachers','is_awarded' ,'description', 'scheme_name', 'created_at', 'updated_at'], 'safe'],
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
        $query = ExtensionActivities::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['extension_activities_id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'extension_activities_id' => $this->extension_activities_id,
            'contact_no' => $this->contact_no,
            'teacher_no' => $this->teacher_no,
            'student_no' => $this->student_no,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'male' => $this->male,
            'female' => $this->female,
            'type' => $this->type,
            'participant_no' => $this->participant_no,
           
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
        ->andFilterWhere(['like', 'is_awarded', $this->is_awarded])
            ->andFilterWhere(['like', 'organising_unit', $this->organising_unit])
            ->andFilterWhere(['like', 'male', $this->male])
            ->andFilterWhere(['like', 'female', $this->female])
            ->andFilterWhere(['like', 'end_date', $this->end_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'participant_no', $this->participant_no])
            ->andFilterWhere(['like', 'teachers', $this->teachers])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'scheme_name', $this->scheme_name]);
            
        if (Yii::$app->user->identity->username != 'admin') {
            $query->andFilterWhere(['user_id' => Yii::$app->user->id ]);
        }
        return $dataProvider;
    }
}
