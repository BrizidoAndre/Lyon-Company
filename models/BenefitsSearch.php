<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Benefits;

/**
 * BenefitsSearch represents the model behind the search form of `app\models\Benefits`.
 */
class BenefitsSearch extends Benefits
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'DiscountTypeID', 'Mandatory'], 'integer'],
            [['DiscountPercentage'], 'number'],
            [['Name'], 'safe'],
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
        $query = Benefits::find();

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
            'DiscountPercentage' => $this->DiscountPercentage,
            'DiscountTypeID' => $this->DiscountTypeID,
            'Mandatory' => $this->Mandatory,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name]);

        return $dataProvider;
    }
}
