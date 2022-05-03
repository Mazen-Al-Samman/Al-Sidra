<?php

namespace common\models;

use yii\base\Model;
use yii\helpers\Json;

class RealEstateItem extends Model
{
    public $title;
    public $body;
    public $img;

    public function rules()
    {
        return [
            [['title', 'body', 'img'], 'required', 'message' => "لا يمكن ترك حقل {attribute} فارغـًا"]
        ];
    }

    public function prepareData() {
        return [
          'title' => $this->title,
          'body' => $this->body,
          'img' => $this->img
        ];
    }

    public function attributeLabels()
    {
        return [
          'title' => 'النص الرئـيـسـي',
          'body' => 'النص الثـانـوي',
          'img' => 'الصــورة',
        ];
    }

    public static function prepareItems($itemsData) {
        if (empty($itemsData)) return [];
        $items = [];
        foreach ($itemsData as $item) {
            $model = new self();
            $model->load($item, '');
            if (!$model->validate()) continue;
            $items[] = $model;
        }
        return $items;
    }
}