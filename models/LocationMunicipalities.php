<?php

namespace models;

use Yii;

/**
 * Class PostalCode
 * @package models
 */
class PostalCode extends \yii\db\ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'shop_postal_code';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['name', 'string', 'max' => 255],
            [['latitude', 'longitude'], 'number'],
            [['zip'], 'string', 'max' => 16],

        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('shop', 'Name'),
            'latitude' => Yii::t('shop', 'Latitude'),
            'longitude' => Yii::t('shop', 'Longitude'),
            'zip' => Yii::t('shop', 'Zip'),
        ];
    }
}