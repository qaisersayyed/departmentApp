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

    public $to;
    public $from;

    public function rules()
    {
        return [
            [['auditing_member_id','user_id'], 'integer'],
            [['name', 'start_date', 'end_date', 'college_name', 'program', 'faculty_name', 'academic_year_id','faculty_id', 'created_at', 'updated_at'], 'safe'],
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

        $query->joinWith('academicYear');
        $query->joinWith('faculty');

        // grid filtering conditions
        $query->andFilterWhere([
            'auditing_member_id' => $this->auditing_member_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'academic_year_id' => $this->academic_year_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        if ($this->to != "" && $this->from != "") {
            $query->andFilterWhere(['between', 'start_date', $this->from, $this->to]);
        }

        $query->andFilterWhere(['like', 'auditing_member.name', $this->name])
            ->andFilterWhere(['like', 'college_name', $this->college_name])
            ->andFilterWhere(['like', 'program', $this->program])
            ->andFilterWhere(['like', 'faculty_name', $this->faculty_name])
            ->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id])
            ->andFilterWhere(['like', 'faculty.name', $this->faculty_id])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'end_date', $this->end_date]);

        if (Yii::$app->user->identity->username != 'admin') {
            $query->andFilterWhere(['auditing_member.user_id' => Yii::$app->user->id]);
        }

        return $dataProvider;
    }
}
