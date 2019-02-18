<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SubjectExpert;

/**
 * SearchSubjectExpert represents the model behind the search form of `app\models\SubjectExpert`.
 */
class SearchSubjectExpert extends SubjectExpert
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_expert_id'], 'integer'],
            [['faculty_id', 'created_at', 'updated_at', 'department_id', 'academic_year_id'], 'safe'],
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
        $query = SubjectExpert::find();

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
        $query->joinWith('department');
        $query->joinWith('academicYear');
        $query->joinWith('faculty');
        // grid filtering conditions
        $query->andFilterWhere([
            'subject_expert_id' => $this->subject_expert_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'faculty.name', $this->faculty_id]);
        $query->andFilterWhere(['like', 'department.name', $this->department_id]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);

        return $dataProvider;
    }
}
