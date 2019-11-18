<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BookPublished;

/**
 * SearchBookPublished represents the model behind the search form of `app\models\BookPublished`.
 */
class SearchBookPublished extends BookPublished
{   
    public $to;
    public $from;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_published_id', 'student_involved', 'file2', 'file3', 'file4'], 'integer'],
            [['book_title', 'author', 'edited_volume', 'date', 'publisher', 'isbn', 'student_name', 'description', 'created_at', 'updated_at', 'file1'], 'safe'],
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
        $query = BookPublished::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['book_published_id'=>SORT_DESC]],
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
            'book_published_id' => $this->book_published_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'book_title', $this->book_title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'edited_volume', $this->edited_volume])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'publisher', $this->publisher])
            ->andFilterWhere(['like', 'isbn', $this->isbn])
            ->andFilterWhere(['like', 'student_name', $this->student_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file1', $this->file1]);

        if(Yii::$app->user->identity->username != 'admin'){
            $query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }
        
        return $dataProvider;
    }
}
