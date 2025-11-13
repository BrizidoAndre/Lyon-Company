<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Addresses".
 *
 * @property int $ID
 * @property string|null $Street
 * @property int|null $Number
 * @property string|null $CEP
 * @property int|null $CityID
 *
 * @property Cities $city
 * @property People[] $peoples
 */
class Addresses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Addresses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Number', 'CityID'], 'integer'],
            [['Street', 'CEP'], 'string', 'max' => 50],
            [['CityID'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::class, 'targetAttribute' => ['CityID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Street' => 'Street',
            'Number' => 'Number',
            'CEP' => 'Cep',
            'CityID' => 'City ID',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::class, ['ID' => 'CityID']);
    }

    /**
     * Gets query for [[Peoples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::class, ['AddressID' => 'ID']);
    }
}
