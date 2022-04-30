<?php

namespace frontend\models;

use yii\base\Model;

class RealEstate extends Model
{
    public $name;
    public $email;
    public $phone;
    public $message;

    public function rules()
    {
        return [
            [['name', 'email', 'message', 'phone'], 'trim'],
            [['name', 'email', 'message', 'phone'], 'required', 'message' => 'لا يمكن ترك حقل {attribute} فارغًـا'],
            ['name', 'string', 'min' => 2,
                'message' => '{attribute} يجب أن يكون نصّـًا',
                'tooShort' => 'يجب أن يحتوي {attribute} على حرفين كـ حد أدنى'
            ],
            ['email', 'email', 'message' => 'يجب إدخال {attribute} بشكل صحيح!'],
//            ['phone', 'validatePhone'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'الاســم',
            'email' => 'البريــد الإلكتـروني',
            'phone' => 'رقـم الهاتــف',
            'message' => 'نص الرســالة'
        ];
    }
}