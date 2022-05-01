<?php

namespace common\helpers;

use Yii;
use yii\base\Exception;

class Utilities
{
    /**
     * @throws Exception
     */
    public static function uploadImage($uploadFile, $path = '') {
        if(!empty($uploadFile)) {
            $imgName = 'logo_' . Yii::$app->security->generateRandomString(10) . "." . $uploadFile->extension;
            $imgName = str_replace(" ","-",$imgName);
            $uploadFile->saveAs(Yii::getAlias('@uploads') . '/' . $path . $imgName);
            return $imgName;
        }
        return null;
    }
}