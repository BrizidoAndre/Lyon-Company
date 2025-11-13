<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Roles".
 *
 * @property int $ID
 * @property string|null $Name
 * @property float|null $AmountPerDday
 *
 * @property Employees[] $employees
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['AmountPerDday'], 'number'],
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
            'AmountPerDday' => 'Amount Per Dday',
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::class, ['RoleID' => 'ID']);
    }
}
