<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Organization;

/**
 * SearchOrganization represents the model behind the search form of `app\models\Organization`.
 */
class SearchOrganization extends Organization
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization_id', 'user_id'], 'integer'],
            [['company_name', 'contact_no', 'created_at', 'updated_at'], 'safe'],
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
        $query = Organization::find();

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
            'organization_id' => $this->organization_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'contact_no', $this->contact_no]);

        // Displaying data related to particular user
        if(yii::$app->user->identity->username != 'admin'){
            $query->andFilterWhere(['user_id' => Yii::$app->user->id]);
        }

        return $dataProvider;
    }
}
