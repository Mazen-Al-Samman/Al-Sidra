<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

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

    public function getImagePath()
    {
        if (empty($this->img)) return null;
        return Yii::$app->params['filesUrl'] . "/{$this->img}";
    }

    public function afterSave($insert, $changedAttributes)
    {
        self::purgeLandings();
        parent::afterSave($insert, $changedAttributes);
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

    /**
     * @throws NotFoundHttpException
     */
    public static function getBySlug($slug)
    {
        $model = self::find()->where(['slug' => $slug])->one();
        if (empty($model)) throw new NotFoundHttpException("Can't find page");
        return $model;
    }

    public static function getAll($useCache = true)
    {
        if (!$useCache || Yii::$app->cache->get('landing') === false) {
            $models = self::find()->all();
            $landingData = [];
            foreach ($models as $model) {
                $landingData[] = ['url' => Url::to(['site/landing', 'slug' => $model->slug]), 'label' => $model->main_text];
            }
            Yii::$app->cache->set('landing', $landingData);
        }
        return Yii::$app->cache->get('landing');
    }

    public static function purgeLandings() {
        self::getAll(false);
    }
}
