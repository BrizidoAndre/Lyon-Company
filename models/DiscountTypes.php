<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DiscountTypes".
 *
 * @property int $ID
 * @property string|null $Name
 *
 * @property Benefits[] $benefits
 * @property Discounts[] $discounts
 */
class DiscountTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DiscountTypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Benefits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBenefits()
    {
        return $this->hasMany(Benefits::class, ['DiscountTypeID' => 'ID']);
    }

    /**
     * Gets query for [[Discounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscounts()
    {
        return $this->hasMany(Discounts::class, ['DiscountTypeID' => 'ID']);
    }
}
