<?php

namespace common\models;

class Constant
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLE = 0;
    const STATUS_NAMES = [
        self::STATUS_ACTIVE => 'فعـّـــال',
        self::STATUS_DISABLE => 'غير فعـّـــال',
    ];
}