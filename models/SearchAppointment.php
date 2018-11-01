<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appointment;

/**
 * SearchAppointment represents the model behind the search form of `app\models\Appointment`.
 */
class SearchAppointment extends Appointment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appointment_id', ], 'integer'],
            [['date_of_joining', 'date_of_leaving','faculty_id','Type', 'created_at', 'updated_at', 'status'], 'safe'],
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
        $query = Appointment::find();
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
        $query->joinwith('faculty');
       

        // grid filtering conditions
        $query->andFilterWhere([
            'appointment_id' => $this->appointment_id,
            //'date_of_joining' => $this->date_of_joining,
            //'date_of_leaving' => $this->date_of_leaving,
            //'faculty_id' => $this->faculty_id,
            'Type'=>$this->Type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'appointment.status'=>1,
        ]);

        $query->andFilterWhere(['like', 'appointment.status', $this->status])
              ->andFilterWhere(['like', 'Faculty.name', $this->faculty_id])
              ->andFilterWhere(['like', 'appointment.date_of_joining', $this->date_of_joining])
              ->andFilterWhere(['like', 'appointment.date_of_leaving', $this->date_of_leaving]);

        return $dataProvider;
    }
}
