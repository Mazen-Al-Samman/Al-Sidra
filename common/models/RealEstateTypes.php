<?php

namespace common\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "real_estate_types".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $created_at
 * @property array $config
 */
class RealEstateTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'real_estate_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['created_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'اسم العقــار',
            'slug' => 'المعـّرف',
            'created_at' => 'تـاريخ الإضــافة',
        ];
    }

    /**
     * @throws NotFoundHttpException
     */
    public static function getBySlug($slug) {
        $model = self::find()->where(['slug' => $slug])->one();
        if (empty($model)) throw new NotFoundHttpException("Can't find page");
        return $model;
    }

    public function getConfig() {
        return $this->hasMany(RealEstateConfig::class, ['real_estate_id' => 'id']);
    }
}