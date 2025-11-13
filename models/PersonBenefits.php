<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PersonBenefits".
 *
 * @property int $ID
 * @property int|null $PersonID
 * @property int|null $BenefitID
 * @property string|null $CancelationDate
 * @property string|null $Amount
 * @property int|null $Occurrence
 * @property string|null $SolicitationDate
 *
 * @property Benefits $benefit
 * @property People $person
 */
class PersonBenefits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PersonBenefits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['BenefitID','Amount'], 'required'],
            [['Amount'], 'integer','min' => 1,'message' => 'Não pode ser menor que 1'],
            [['PersonID', 'BenefitID', 'Occurrence'], 'integer'],
            [['SolicitationDate'], 'safe'],
            [['CancelationDate', 'Amount'], 'string', 'max' => 10],
            [['BenefitID'], 'exist', 'skipOnError' => true, 'targetClass' => Benefits::class, 'targetAttribute' => ['BenefitID' => 'ID']],
            [['PersonID'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['PersonID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PersonID' => 'Person ID',
            'BenefitID' => 'Benefit ID',
            'CancelationDate' => 'Cancelation Date',
            'Amount' => 'Amount',
            'Occurrence' => 'Occurrence',
            'SolicitationDate' => 'Solicitation Date',
        ];
    }

    /**
     * Gets query for [[Benefit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBenefit()
    {
        return $this->hasOne(Benefits::class, ['ID' => 'BenefitID']);
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(People::class, ['ID' => 'PersonID']);
    }
}
