<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "Employees".
 *
 * @property int $ID
 * @property string|null $Email
 * @property string|null $Password
 * @property string|null $AdmissionDate
 * @property int|null $HasAdvance
 * @property int|null $ManagerID
 * @property int|null $RoleID
 *
 * @property Frequencies[] $frequencies
 * @property People $iD
 * @property People $manager
 * @property Roles $role
 * @property-read \yii\db\ActiveQuery $people
 * @property-read int $id
 * @property-read void $authKey
 * @property Vacations[] $vacations
 */
class Employees extends \yii\db\ActiveRecord implements IdentityInterface
{
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_DEPENDENT = 'dependent';

    public $magicName;

    public $ConfirmPassword;
    public $ConfirmEmail;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Email', 'Password', 'ConfirmPassword', 'RoleID',], 'required', 'except' => self::SCENARIO_LOGIN],
            [['Email', 'Password'], 'required', 'on' => self::SCENARIO_LOGIN],
            ['Email', 'email',],
            [['ConfirmEmail'],'email'],
            [['ConfirmEmail'], 'required', 'on' => self::SCENARIO_DEPENDENT],
            [['ConfirmEmail'], 'compare', 'compareAttribute' => 'Email'],
            ['ConfirmPassword', 'compare', 'compareAttribute' => 'Password',],
            [['ID', 'HasAdvance', 'ManagerID', 'RoleID'], 'integer'],
            [['AdmissionDate'], 'safe'],
            [['Email'], 'string', 'max' => 255, 'min' => 6],
            [['Password'], 'string', 'max' => 100, 'min' => 6],
            [['ID'], 'unique'],
            [['ID'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['ID' => 'ID']],
            [['ManagerID'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['ManagerID' => 'ID']],
            [['RoleID'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['RoleID' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Email' => 'Email',
            'Password' => 'Password',
            'AdmissionDate' => 'Admission Date',
            'HasAdvance' => 'Has Advance',
            'ManagerID' => 'Manager ID',
            'RoleID' => 'Role ID',
        ];
    }

    /**
     * Gets query for [[Frequencies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrequencies()
    {
        return $this->hasMany(Frequencies::class, ['EmployeeID' => 'ID']);
    }

    /**
     * Gets query for [[ID]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::class, ['ID' => 'ID']);
    }

    /**
     * Gets query for [[Manager]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getManager()
    {
        return $this->hasOne(People::class, ['ID' => 'ManagerID']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::class, ['ID' => 'RoleID']);
    }

    /**
     * Gets query for [[Vacations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVacations()
    {
        return $this->hasMany(Vacations::class, ['EmployeID' => 'ID']);
    }

    public function getId()
    {
        return $this->ID;
    }

    public static function findIdentity($id)
    {
        return self::findOne(['ID' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findByEmail($email)
    {
        return self::findOne(['Email' => $email]);
    }

    public function validatePassword($password)
    {
        return $this->Password === $password;
    }
}
