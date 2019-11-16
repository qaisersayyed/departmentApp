<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bos;

/**
 * SearchBos represents the model behind the search form of `app\models\Bos`.
 */

 
class SearchBos extends Bos
{
    /**
     * @inheritdoc
     */
    public $to;
    public $from;
    public function rules()
    {
        return [
            [['bos_id', 'user_id' ], 'integer'],
            [['program','date', 'created_at', 'updated_at', 'department_id',  'academic_year_id'], 'safe'],
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
        $query = Bos::find();

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
        // grid filtering conditions

        if ($this->to != "" && $this->from != "") {
            $query->andFilterWhere(['between', 'date', $this->from, $this->to]);
        }

        $query->andFilterWhere([
            'bos_id' => $this->bos_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'program', $this->program]);
            //   ->andFilterWhere(['like', 'minutes', $this->minutes]);
        $query->andFilterWhere(['like', 'academic_year.year', $this->academic_year_id]);
        $query->andFilterWhere(['like', 'date', $this->date]);

        if (Yii::$app->user->identity->username != 'admin') {
            $query->andFilterWhere(['user_id' => Yii::$app->user->id ]);
        }
        return $dataProvider;
    }
}
