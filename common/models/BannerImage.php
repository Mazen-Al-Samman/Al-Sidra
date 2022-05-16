<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner_image".
 *
 * @property int $id
 * @property string $img_name
 */
class BannerImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_name'], 'required'],
            [['img_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img_name' => 'الصورة',
        ];
    }
}