<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agency;

/**
 * SearchAgency represents the model behind the search form of `app\models\Agency`.
 */
class SearchAgency extends Agency
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agency_id', 'user_id'], 'integer'],
            [['name'], 'safe'],
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
        $query = Agency::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['agency_id'=>SORT_DESC]],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'agency_id' => $this->agency_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        // Displaying data related to particular user
        if (yii::$app->user->identity->username != 'admin') {
            $query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }

        return $dataProvider;
    }
}
