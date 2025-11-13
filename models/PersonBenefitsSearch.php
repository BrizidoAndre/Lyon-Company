<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonBenefits;

/**
 * PersonBenefitsSearch represents the model behind the search form of `app\models\PersonBenefits`.
 */
class PersonBenefitsSearch extends PersonBenefits
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'PersonID', 'BenefitID', 'Occurrence'], 'integer'],
            [['CancelationDate', 'Amount', 'SolicitationDate'], 'safe'],
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
        $query = PersonBenefits::find();

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
            'ID' => $this->ID,
            'PersonID' => $this->PersonID,
            'BenefitID' => $this->BenefitID,
            'Occurrence' => $this->Occurrence,
            'SolicitationDate' => $this->SolicitationDate,
        ]);

        $query->andFilterWhere(['like', 'CancelationDate', $this->CancelationDate])
            ->andFilterWhere(['like', 'Amount', $this->Amount]);

        return $dataProvider;
    }
}
