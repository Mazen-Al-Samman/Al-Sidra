<?php

namespace frontend\controllers;

use common\helpers\Utilities;
use common\models\RealEstate;
use common\models\RealEstateMarketing;
use common\models\RealEstateRating;
use common\models\RealEstateRequest;
use Yii;
use yii\base\Exception;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class RealEstateController extends AccessController
{
    public function actionRequest()
    {
        $model = new RealEstateRequest();
        $model->loadDefaultValues();
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
            return $this->redirect(['real-estate/request']);
        }
        return $this->render('request-form', ['model' => $model]);
    }


    public function actionAdd()
    {
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

    public function actionRate()
    {
        $model = new RealEstateRating();
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
            return $this->redirect(['real-estate/rate']);
        }
        return $this->render('real-estate-rating', ['model' => $model]);
    }

    /**
     * @throws Exception
     */
    public function actionMarketing()
    {
        $model = new RealEstateMarketing();
        $type = 'success';
        $msg = 'تم إرسال الطلب';

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $reportImg = Utilities::uploadImage(UploadedFile::getInstance($model, 'report_img'));
            $realEstateImg = Utilities::uploadImage(UploadedFile::getInstance($model, 'real_estate_img'));
            $model->report_img = $reportImg;
            $model->real_estate_img = $realEstateImg;
            if (!$model->save()) {
                $type = 'error';
                $msg = 'حدث خطأ أثناء إرسال الطلب .. يرجى المحـاولة لاحقـًا';
            }
            Yii::$app->session->setFlash($type, $msg);
            return $this->redirect(['real-estate/marketing']);
        }
        return $this->render('real-estate-marketing', ['model' => $model]);
    }
}