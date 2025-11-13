<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Discounts".
 *
 * @property int $ID
 * @property int|null $PersonID
 * @property float|null $Amount
 * @property string|null $Description
 * @property int|null $DiscountTypeID
 *
 * @property DiscountTypes $discountType
 * @property People $person
 */
class Discounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Discounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PersonID', 'DiscountTypeID'], 'integer'],
            [['Amount'], 'number'],
            [['Description'], 'string'],
            [['DiscountTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => DiscountTypes::class, 'targetAttribute' => ['DiscountTypeID' => 'ID']],
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
            'Amount' => 'Amount',
            'Description' => 'Description',
            'DiscountTypeID' => 'Discount Type ID',
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
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(People::class, ['ID' => 'PersonID']);
    }
}
