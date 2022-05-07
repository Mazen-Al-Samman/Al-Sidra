<?php

namespace common\models;

class Constant
{
    const STATUS_DISABLE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_READ = 2;
    const STATUS_NAMES = [
        self::STATUS_ACTIVE => 'فعـّـــال',
        self::STATUS_DISABLE => 'غير فعـّـــال',
    ];
    const YES_NO = [
        self::STATUS_ACTIVE => 'نــعـم',
        self::STATUS_DISABLE => 'لا',
    ];

    const READ_STATUS = [
        self::STATUS_DISABLE => 'غير فعّــال',
        self::STATUS_ACTIVE => 'غير مقروء',
        self::STATUS_READ => 'مقروء',
    ];
}