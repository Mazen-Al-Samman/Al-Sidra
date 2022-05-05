<?php

namespace common\models;

use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    public function validatePhone($attribute) {
        $pattern = '/^(009665|9665|\+9665|05|5)([503649187])(\d{7})$/';
        if (!preg_match($pattern, $this->{$attribute})) {
            $this->addError($attribute, 'يرجى إدخال رقم سعودي صحيح !');
        }
    }
}