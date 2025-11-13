<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PersonTypes".
 *
 * @property int $ID
 * @property string|null $Name
 *
 * @property People[] $peoples
 */
class PersonTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PersonTypes';
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
     * Gets query for [[Peoples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::class, ['TypeID' => 'ID']);
    }
}
