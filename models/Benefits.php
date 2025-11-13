<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Benefits".
 *
 * @property int $ID
 * @property float $DiscountPercentage
 * @property int|null $DiscountTypeID
 * @property string|null $Name
 * @property int|null $Mandatory
 *
 * @property DiscountTypes $discountType
 * @property PersonBenefits[] $personBenefits
 */
class Benefits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Benefits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DiscountPercentage'], 'required'],
            [['DiscountPercentage'], 'number'],
            [['DiscountTypeID', 'Mandatory'], 'integer'],
            [['Name'], 'string', 'max' => 50],
            [['DiscountTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => DiscountTypes::class, 'targetAttribute' => ['DiscountTypeID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DiscountPercentage' => 'Discount Percentage',
            'DiscountTypeID' => 'Discount Type ID',
            'Name' => 'Name',
            'Mandatory' => 'Mandatory',
        ];
    }

    /**
     * Gets query for [[DiscountType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountType()
    {
        return $this->hasOne(DiscountTypes::class, ['ID' => 'DiscountTypeID']);
    }

    /**
     * Gets query for [[PersonBenefits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonBenefits()
    {
        return $this->hasMany(PersonBenefits::class, ['BenefitID' => 'ID']);
    }
}
