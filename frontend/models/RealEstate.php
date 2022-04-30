<?php

namespace frontend\models;

use yii\base\Model;

class RealEstate extends Model
{
    public $contractType;
    public $realEstateType;
    public $address;
    public $city;
    public $neighborhood;
    public $street;
    public $numOfInterfaces;
    public $numOfStreets;
    public $price;
    public $area;
    public $phone;
    public $name;
    public $notes;

    public function attributeLabels()
    {
        return [
            'contractType' => 'نوع العقــد',
            'realEstateType' => 'نوع العقــار',
            'address' => 'العنـوان',
            'city' => 'المديـنــة',
            'neighborhood' => 'الحــي',
            'street' => 'الشــارع',
            'numOfInterfaces' => 'عدد الواجهـــات',
            'numOfStreets' => 'عدد الشــوارع',
            'price' => 'السعــر بالريال الســعودي',
            'area' => 'المســاحة بالمتر',
            'phone' => 'رقــم الهاتــف',
            'name' => 'اســم صاحـب العقــار',
            'notes' => 'ملاحظـــات',
        ];
    }
}