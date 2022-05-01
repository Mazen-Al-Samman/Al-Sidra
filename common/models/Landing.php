<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "landing".
 *
 * @property int $id
 * @property string $slug
 * @property string|null $img
 * @property string|null $main_text
 * @property string|null $body
 * @property string|null $phone
 * @property int|null $has_whatsapp
 */
class Landing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'landing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug'], 'required'],
            [['has_whatsapp'], 'integer'],
            [['slug', 'img', 'main_text', 'body', 'phone'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    public function getImagePath() {
        if (empty($this->img)) return null;
        return Yii::$app->params['filesUrl'] . "/{$this->img}";
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'المعـرّف',
            'img' => 'الصـورة',
            'main_text' => 'النـص الأسـاسـي',
            'body' => 'النـص الثـانـوي',
            'phone' => 'رقـم الهاتـف',
            'has_whatsapp' => 'هل الهاتـف مرتبـط بـ واتـسـاب؟',
        ];
    }
}
