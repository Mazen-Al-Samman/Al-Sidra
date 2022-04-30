<?php

namespace frontend\controllers;

use frontend\models\RealEstate;
use frontend\models\RealEstateRequest;
use Yii;
use yii\web\Controller;

class RealEstateController extends Controller
{
    public function actionRequest() {
        $model = new RealEstateRequest();

        if (Yii::$app->request->isPost) {
            Yii::$app->session->setFlash("success", 'تم إرسال الطلب');
        }
        return $this->render('request-form', ['model' => $model]);
    }

    public function actionAdd() {
        $model = new RealEstate();

        if (Yii::$app->request->isPost) {
            Yii::$app->session->setFlash("success", 'تم إرسال الطلب');
        }
        return $this->render('add-form', ['model' => $model]);
    }
}