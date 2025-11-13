<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Holydays".
 *
 * @property int $ID
 * @property string|null $Description
 * @property string $Date
 */
class Holydays extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Holydays';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Description'], 'string'],
            [['Date'], 'required'],
            [['Date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Description' => 'Description',
            'Date' => 'Date',
        ];
    }
}
