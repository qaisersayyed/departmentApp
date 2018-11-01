<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaperType;
use app\models\Paper;

/**
 * SearchPaperType represents the model behind the search form of `app\models\PaperType`.
 */
class SearchPaperType extends PaperType
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;
    public function rules()
    {
        return [
            [['paper_type_id'], 'integer'],
            [[ 'status','paper_id',  'type_id', 'academic_year_id'], 'safe'],
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
        $query = PaperType::find();
     
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

        $query->joinWith('paper');
        $query->joinWith('type');
        $query->joinWith('academicYear');
       

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'academic_year.year', $this->from, $this->to]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'paper_type_id' => $this->paper_type_id,
            
            'paper_type.status'=>1,
            
        ]);

        $query->andFilterWhere(['like', 'paper.name', $this->paper_id]);
        $query->andFilterWhere(['like', 'type.name', $this->type_id]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);
       
        return $dataProvider;
        
    }
}
