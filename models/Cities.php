<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cities".
 *
 * @property int $ID
 * @property string|null $Name
 * @property int|null $StateID
 *
 * @property Addresses[] $addresses
 * @property States $state
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['StateID'], 'integer'],
            [['Name'], 'string', 'max' => 50],
            [['StateID'], 'exist', 'skipOnError' => true, 'targetClass' => States::class, 'targetAttribute' => ['StateID' => 'ID']],
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
            'StateID' => 'State ID',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Addresses::class, ['CityID' => 'ID']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(States::class, ['ID' => 'StateID']);
    }
}
