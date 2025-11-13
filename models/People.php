<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "People".
 *
 * @property int $ID
 * @property string|null $Name
 * @property string|null $BirthDay
 * @property string|null $Photo
 * @property int|null $ResponsibleID
 * @property int|null $TypeID
 * @property int|null $AddressID
 *
 * @property Addresses $address
 * @property Discounts[] $discounts
 * @property Documents[] $documents
 * @property Employees $employees
 * @property Employees[] $employees0
 * @property People[] $peoples
 * @property PersonBenefits[] $personBenefits
 * @property Phones[] $phones
 * @property People $responsible
 * @property PersonTypes $type
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'People';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'BirthDay', 'ResponsibleID',], 'required'],
            [['Photo'], 'image', 'extensions' => ['jpg', 'png']],
            [['BirthDay'], 'date', 'format' => 'php:Y-m-d'],
            ['BirthDay', 'verifyAdult'],
            [['ResponsibleID', 'TypeID', 'AddressID'], 'integer'],
            [['Name'], 'string', 'max' => 50],
            [['Name'], 'trim'],
            [['Name'], 'verifyName'],
            [['AddressID'], 'exist', 'skipOnError' => true, 'targetClass' => Addresses::class, 'targetAttribute' => ['AddressID' => 'ID']],
            [['ResponsibleID'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['ResponsibleID' => 'ID']],
            [['TypeID'], 'exist', 'skipOnError' => true, 'targetClass' => PersonTypes::class, 'targetAttribute' => ['TypeID' => 'ID']],
        ];
    }
    public function verifyAdult($attribute)
    {
        $date = date_create_from_format('Y-m-d', $this->BirthDay);
        $now = new \DateTime();
        $diff = $now->diff($date);

        if ($diff->y < 18) {
            $this->addError($attribute, 'O usuário deve ter menos que 18 anos');
        }
    }

    public function verifyName($attribute)
    {
        if (!str_contains($this->Name, ' ')) {
            $this->addError($attribute, 'O nome deve ser completo. Ex: Fulano da Silva');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'BirthDay' => 'Birth Day',
            'Photo' => 'Photo',
            'ResponsibleID' => 'Responsible ID',
            'TypeID' => 'Type ID',
            'AddressID' => 'Address ID',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Addresses::class, ['ID' => 'AddressID']);
    }

    /**
     * Gets query for [[Discounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscounts()
    {
        return $this->hasMany(Discounts::class, ['PersonID' => 'ID']);
    }

    /**
     * Gets query for [[Documents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::class, ['PersonID' => 'ID']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasOne(Employees::class, ['ID' => 'ID']);
    }

    /**
     * Gets query for [[Employees0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees0()
    {
        return $this->hasMany(Employees::class, ['ManagerID' => 'ID']);
    }

    /**
     * Gets query for [[Peoples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeoples()
    {
        return $this->hasMany(People::class, ['ResponsibleID' => 'ID']);
    }

    /**
     * Gets query for [[PersonBenefits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonBenefits()
    {
        return $this->hasMany(PersonBenefits::class, ['PersonID' => 'ID']);
    }

    /**
     * Gets query for [[Phones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phones::class, ['PersonID' => 'ID']);
    }

    /**
     * Gets query for [[Responsible]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible()
    {
        return $this->hasOne(People::class, ['ID' => 'ResponsibleID']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PersonTypes::class, ['ID' => 'TypeID']);
    }
}
