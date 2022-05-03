<?php

namespace common\models;

use yii\base\Model;

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
          'title' => 'النص الرئيسي',
          'body' => 'النص الثانوي',
          'img' => 'الصـورة',
        ];
    }
}