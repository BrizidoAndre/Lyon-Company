<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DocumentTypes".
 *
 * @property int $ID
 * @property string|null $Name
 * @property string|null $Validation
 *
 * @property Documents[] $documents
 */
class DocumentTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'DocumentTypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'Validation'], 'string', 'max' => 50],
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
            'Validation' => 'Validation',
        ];
    }

    /**
     * Gets query for [[Documents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::class, ['DocTypeID' => 'ID']);
    }
}
