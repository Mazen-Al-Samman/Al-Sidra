<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
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

    public function getOrCreateConfig() {
        if (!empty($this->config)) return $this->config;
        $model = new RealEstateConfig();
        $model->real_estate_id = $this->id;
        return $model;
    }

    public function getConfig() {
        return $this->hasOne(RealEstateConfig::class, ['real_estate_id' => 'id']);
    }

    public static function getAll() {
        $models = self::find()->all();
        $typesData = [];
        foreach ($models as $model) {
            $typesData[] = ['url' => Url::to(['site/view', 'slug' => $model->slug]), 'label' => $model->title];
        }
        return $typesData;
    }
}