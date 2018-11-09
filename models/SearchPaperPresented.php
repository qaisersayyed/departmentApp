<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaperPresented;

/**
 * SearchPaperPresented represents the model behind the search form of `app\models\PaperPresented`.
 */
class SearchPaperPresented extends PaperPresented
{
    public $to;
    public $from;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paper_presented_id', 'status'], 'integer'],
            [['paper_presented_file', 'paper_title', 'conference_name', 'venue', 'date', 'created_at', 'updated_at'], 'safe'],
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
        $query = PaperPresented::find()->where(['status'=>1]);


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

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'date', $this->from, $this->to]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'paper_presented_id' => $this->paper_presented_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status'=>1,
        ]);

        $query->andFilterWhere(['like', 'paper_presented_file', $this->paper_presented_file])
            ->andFilterWhere(['like', 'paper_title', $this->paper_title])
            ->andFilterWhere(['like', 'conference_name', $this->conference_name])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'venue', $this->venue])
            ->andFilterWhere(['like', 'date', $this->date]);
            
        return $dataProvider;
    }
}
