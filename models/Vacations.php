<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Vacations".
 *
 * @property int $ID
 * @property int|null $EmployeID
 * @property string|null $StartDate
 * @property string|null $EndDate
 * @property int|null $Allowance
 *
 * @property Employees $employe
 */
class Vacations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Vacations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['EmployeID', 'Allowance'], 'integer'],
            [['StartDate', 'EndDate'], 'safe'],
            [['EmployeID'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::class, 'targetAttribute' => ['EmployeID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'EmployeID' => 'Employe ID',
            'StartDate' => 'Start Date',
            'EndDate' => 'End Date',
            'Allowance' => 'Allowance',
        ];
    }

    /**
     * Gets query for [[Employe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmploye()
    {
        return $this->hasOne(Employees::class, ['ID' => 'EmployeID']);
    }
}
