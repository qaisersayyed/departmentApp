<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Program;

/**
 * SearchProgram represents the model behind the search form of `app\models\Program`.
 */
class SearchProgram extends Program
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['program_id', 'user_id'], 'integer'],
            [['name', 'created_at', 'updated_at', 'status' ,'department_id'], 'safe'],
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
        $query = Program::find()->where(['status'=>1]);

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
        // grid filtering conditions
        $query->andFilterWhere([
            'program_id' => $this->program_id,
            //'department_id' => $this->department_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status'=>1,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'department.name', $this->department_id]);

        // Displaying data related to particular user
        if(yii::$app->user->identity->username != 'admin'){
            $query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }

        return $dataProvider;
    }
}
