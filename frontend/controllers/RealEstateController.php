<?php

namespace frontend\controllers;

use common\models\RealEstate;
use frontend\models\RealEstateMarketing;
use frontend\models\RealEstateRating;
use frontend\models\RealEstateRequest;
use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;

class RealEstateController extends AccessController
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
        $type = 'success';
        $msg = 'تم إرسال الطلب';

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!$model->save()) {
                $type = 'error';
                $msg = 'حدث خطأ أثناء إرسال الطلب .. يرجى المحـاولة لاحقـًا';
            }
            Yii::$app->session->setFlash($type, $msg);
            return $this->redirect(['real-estate/add']);
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