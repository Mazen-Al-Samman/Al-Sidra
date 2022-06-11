<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;

class BaseModel extends ActiveRecord
{
    const REQUEST = 'request';
    const ADD = 'add';
    const RATING = 'rating';
    const MARKETING = 'marketing';

    public function validatePhone($attribute)
    {
        $pattern = '/^(009665|9665|\+9665|05|5)([503649187])(\d{7})$/';
        if (!preg_match($pattern, $this->{$attribute})) {
            $this->addError($attribute, 'يرجى إدخال رقم سعودي صحيح !');
        }
    }

    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'member_id']);
    }

    /**
     * @throws NotFoundHttpException
     */
    public static function getById($id, $type)
    {
        $model = null;
        switch ($type) {
            case self::REQUEST:
                $model = RealEstateRequest::findOne(['id' => $id]);
                break;
            case self::ADD:
                $model = RealEstate::findOne(['id' => $id]);
                break;
            case self::RATING:
                $model = RealEstateRating::findOne(['id' => $id]);
                break;
            case self::MARKETING:
                $model = RealEstateMarketing::findOne(['id' => $id]);
                break;
        }
        if (empty($model)) throw new NotFoundHttpException("Can't find Model");
        return $model;
    }

    /**
     * @throws NotFoundHttpException
     */
    public static function ReadModel($id, $type)
    {
        $model = self::getById($id, $type);
        $model->status = Constant::STATUS_READ;
        return $model->save();
    }

    /**
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public static function deleteModel($id, $type) {
        $model = self::getById($id, $type);
        $model->delete();
        return true;
    }
}