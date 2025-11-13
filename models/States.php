<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "States".
 *
 * @property int $ID
 * @property string|null $Name
 * @property string|null $UF
 *
 * @property Cities[] $cities
 */
class States extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'States';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name'], 'string', 'max' => 50],
            [['UF'], 'string', 'max' => 2],
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
            'UF' => 'Uf',
        ];
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(Cities::class, ['StateID' => 'ID']);
    }
}
