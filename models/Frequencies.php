<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Frequencies".
 *
 * @property int $ID
 * @property int|null $EmployeeID
 * @property string|null $Attachment
 * @property string|null $Date
 * @property string|null $Checkin
 * @property string|null $Checkout
 *
 * @property Employees $employee
 */
class Frequencies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Frequencies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeeID'], 'integer'],
            [['Date', 'Checkin', 'Checkout'], 'safe'],
            [['Attachment'], 'string', 'max' => 100],
            [['EmployeeID'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::class, 'targetAttribute' => ['EmployeeID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'EmployeeID' => 'Employee ID',
            'Attachment' => 'Attachment',
            'Date' => 'Date',
            'Checkin' => 'Checkin',
            'Checkout' => 'Checkout',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employees::class, ['ID' => 'EmployeeID']);
    }
}
