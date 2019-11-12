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
            [['title', 'organising_unit','user_id' ,'teachers', 'date','is_awarded' ,'description', 'scheme_name', 'created_at', 'updated_at'], 'safe'],
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
            'date' => $this->date,
           
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => Yii::$app->user->id,
        ]);

        if ($this->is_awarded) {
            if ($this->is_awarded[0] == "y") {
                $this->is_awarded = 1;
            } else {
                $this->is_awarded = 0;
            }
        }

        $query->andFilterWhere(['like', 'title', $this->title])
        ->andFilterWhere(['like', 'is_awarded', $this->is_awarded])
            ->andFilterWhere(['like', 'organising_unit', $this->organising_unit])
            ->andFilterWhere(['like', 'teachers', $this->teachers])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'scheme_name', $this->scheme_name]);
        if (Yii::$app->user->identity->username != 'admin') {
            $query->andFilterWhere(['user_id' => Yii::$app->user->id ]);
        }
        return $dataProvider;
    }
}
