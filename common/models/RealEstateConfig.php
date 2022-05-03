<?php

namespace common\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "real_estate_config".
 *
 * @property int $id
 * @property int $real_estate_id
 * @property string $cards [json]
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
            [['real_estate_id'], 'required'],
            [['real_estate_id'], 'integer'],
            ['cards', 'filter', 'filter' => function ($value) {
                if (empty($value)) return [];
                $cards = [];
                foreach ($value as $item) {
                    $itemModel = new RealEstateItem();
                    $itemModel->load($item, '');
                    $itemModel->validate();
                    $cards[] = $itemModel;
                }
                return $cards;
            }],
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
