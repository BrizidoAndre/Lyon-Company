<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Phones".
 *
 * @property int $ID
 * @property int|null $PersonID
 * @property string|null $Phone
 *
 * @property People $person
 */
class Phones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Phones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PersonID'], 'integer'],
            [['Phone'], 'string', 'max' => 50],
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
            'Phone' => 'Phone',
        ];
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
