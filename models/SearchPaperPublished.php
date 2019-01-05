<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaperPublished;

/**
 * SearchPaperPublished represents the model behind the search form of `app\models\PaperPublished`.
 */
class SearchPaperPublished extends PaperPublished
{

    public $to;
    public $from;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paper_published_id'], 'integer'],
            [['paper_title', 'journal_name', 'date', 'created_at', 'updated_at', 'file'], 'safe'],
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
        $query = PaperPublished::find();

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

        if($this->to != "" && $this->from != ""){
            $query->andFilterWhere(['between', 'date', $this->from, $this->to]);
        }

        $query->andFilterWhere([
            'paper_published_id' => $this->paper_published_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'paper_title', $this->paper_title])
            ->andFilterWhere(['like', 'journal_name', $this->journal_name])
            ->andFilterWhere(['like', 'date', $this->date]);
            
        return $dataProvider;
    }
}
