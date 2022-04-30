<?php

namespace frontend\controllers;

use frontend\models\RealEstate;
use frontend\models\RealEstateMarketing;
use frontend\models\RealEstateRating;
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

    public function actionRate() {
        $model = new RealEstateRating();

        if (Yii::$app->request->isPost) {
            Yii::$app->session->setFlash("success", 'تم إرسال الطلب');
        }
        return $this->render('real-estate-rating', ['model' => $model]);
    }

    public function actionMarketing() {
        $model = new RealEstateMarketing();

        if (Yii::$app->request->isPost) {
            Yii::$app->session->setFlash("success", 'تم إرسال الطلب');
        }
        return $this->render('real-estate-marketing', ['model' => $model]);
    }
}