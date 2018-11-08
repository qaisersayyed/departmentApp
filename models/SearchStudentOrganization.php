<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentOrganization;

/**
 * SearchStudentOrganization represents the model behind the search form of `app\models\StudentOrganization`.
 */
class SearchStudentOrganization extends StudentOrganization
{
    /**
     * @inheritdoc
     */

    public $to;
    public $from;
    public function rules()
    {
        return [
            [['student_organization_id' ], 'integer'],
            [['date_of_joining', 'position', 'created_at', 'updated_at', 'student_id' , 'organization_id','program_id'], 'safe'],
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
        $query = StudentOrganization::find();

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
        $query->joinWith('student');
        $query->joinWith('organization');
        $query->joinWith('program');
        

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'date_of_joining', $this->from, $this->to]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'student_organization_id' => $this->student_organization_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'position', $this->position]);
        $query->andFilterWhere(['like', 'student.name', $this->student_id]);
        $query->andFilterWhere(['like', 'organization.company_name', $this->organization_id]);
        $query->andFilterWhere(['like', 'date_of_joining', $this->date_of_joining]);
        
        

        return $dataProvider;
    }
}
