<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AuditingMember;

/**
 * SearchAuditingMember represents the model behind the search form of `app\models\AuditingMember`.
 */
class SearchAuditingMember extends AuditingMember
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auditing_member_id',], 'integer'],
            [['name', 'start_date', 'end_date', 'college_name', 'program', 'faculty_name', 'department_id', 'academic_year_id', 'created_at', 'updated_at'], 'safe'],
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
        $query = AuditingMember::find();

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
            'auditing_member_id' => $this->auditing_member_id,
            //'start_date' => $this->start_date,
           // 'end_date' => $this->end_date,
            //'department_id' => $this->department_id,
            //'academic_year_id' => $this->academic_year_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'college_name', $this->college_name])
            ->andFilterWhere(['like', 'program', $this->program])
            ->andFilterWhere(['like', 'faculty_name', $this->faculty_name])
            ->andFilterWhere(['like', 'academicYear.year', $this->academic_year_id])
            ->andFilterWhere(['like', 'department.name', $this->department_id])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date]);

        return $dataProvider;
    }
}
