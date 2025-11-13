<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Documents".
 *
 * @property int $ID
 * @property int|null $PersonID
 * @property int|null $DocTypeID
 * @property string|null $Value
 * @property string|null $IssueDate
 * @property string|null $ExpirationDate
 *
 * @property DocumentTypes $docType
 * @property People $person
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PersonID', 'DocTypeID'], 'integer'],
            [['IssueDate', 'ExpirationDate'], 'safe'],
            [['Value'], 'string', 'max' => 50],
            [['DocTypeID'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentTypes::class, 'targetAttribute' => ['DocTypeID' => 'ID']],
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
            'DocTypeID' => 'Doc Type ID',
            'Value' => 'Value',
            'IssueDate' => 'Issue Date',
            'ExpirationDate' => 'Expiration Date',
        ];
    }

    /**
     * Gets query for [[DocType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocType()
    {
        return $this->hasOne(DocumentTypes::class, ['ID' => 'DocTypeID']);
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
