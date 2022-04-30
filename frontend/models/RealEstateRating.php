<?php

namespace frontend\models;

use yii\base\Model;

class RealEstateRating extends Model
{
    public $customer_name;
    public $phone;
    public $real_estate_type;
    public $reporter_name;
    public $real_estate_location;
    public $rating_reason;

    public function attributeLabels()
    {
        return [
            'customer_name' => 'اســم العميـل',
            'phone' => 'رقــم الجـوال',
            'real_estate_type' => 'نـوع العقــار',
            'reporter_name' => 'اسم طـالب التقـرير',
            'real_estate_location' => 'مـوقــع العقــار',
            'rating_reason' => 'الغـرض من التقيــيم',
        ];
    }
}