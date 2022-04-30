<?php

namespace frontend\models;

use yii\base\Model;

class RealEstateMarketing extends Model
{
    public $name;
    public $email;
    public $real_estate_type;
    public $real_estate_location;
    public $phone;

    public function attributeLabels()
    {
        return [
            'name' => 'الاســم',
            'phone' => 'رقــم الجـوال',
            'real_estate_type' => 'نـوع العقــار',
            'email' => 'البريـد الإلكـترونــي',
            'real_estate_location' => 'مـوقــع العقــار',
        ];
    }
}