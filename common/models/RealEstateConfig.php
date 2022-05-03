<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "real_estate_config".
 *
 * @property int $id
 * @property int $real_estate_id
 * @property string $card_title
 * @property string $card_desc
 * @property string $card_img
 */
class RealEstateConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'real_estate_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['real_estate_id', 'card_title', 'card_desc', 'card_img'], 'required'],
            [['real_estate_id'], 'integer'],
            [['card_title', 'card_desc', 'card_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'real_estate_id' => 'Real Estate ID',
            'card_title' => 'Card Title',
            'card_desc' => 'Card Desc',
            'card_img' => 'Card Img',
        ];
    }
}
