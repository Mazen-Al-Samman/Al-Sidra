<?php

namespace backend\controllers;

use common\helpers\Utilities;
use common\models\Landing;
use common\models\LoginForm;
use common\models\RealEstateItem;
use common\models\RealEstateTypes;
use frontend\models\RealEstate;
use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends AccessController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionLandingPages() {
        $dataProvider = new ActiveDataProvider([
           'query' => Landing::find(),
        ]);
        return $this->render('landing-config', ['dataProvider' => $dataProvider]);
    }

    public function actionRealEstate() {
        $dataProvider = new ActiveDataProvider([
            'query' => RealEstateTypes::find(),
        ]);
        return $this->render('real-estate-type', ['dataProvider' => $dataProvider]);
    }

    public function actionCreateRealEstate() {
        $model = new RealEstateTypes();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!$model->save()) Yii::$app->session->setFlash('error', Json::encode($model->getFirstErrors()));
            return $this->redirect(['site/real-estate']);
        }
        return $this->renderAjax('_real-estate-form', ['model' => $model]);
    }

    /**
     * @throws Exception
     */
    public function actionCreateLanding() {
        $model = new Landing();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $img = Utilities::uploadImage(UploadedFile::getInstance($model, 'img'));
            $model->img = $img;
            if (!$model->save()) Yii::$app->session->setFlash('error', Json::encode($model->getFirstErrors()));
            return $this->redirect(['site/landing-pages']);
        }
        return $this->renderAjax('_landing-form', ['model' => $model]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionRealEstateConfig($slug) {
        $realEstateModel = RealEstateTypes::getBySlug($slug);
        return $this->render('real-estate-config', ['model' => $realEstateModel]);
    }

    /**
     * @throws Exception
     */
    public function actionAddItem($validate = false) {
        $model = new RealEstateItem();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $img = Utilities::uploadImage(UploadedFile::getInstance($model, 'img'));
            $model->img = $img;
            $model->validate();
            Yii::$app->response->format = Response::FORMAT_JSON;
            if (!empty($model->errors) || $validate) {
                Yii::$app->response->statusCode = 201;
                return $model->errors;
            }
            return $model->prepareData();
        }
        return $this->renderAjax('_item', ['model' => $model]);
    }

    /**
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function actionEditRealEstate($slug) {
        $model = RealEstateTypes::getBySlug($slug);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            if (!$model->save()) Yii::$app->session->setFlash('error', Json::encode($model->getFirstErrors()));
            return $this->redirect(['site/real-estate']);
        }
        return $this->renderAjax('_real-estate-form', ['model' => $model]);
    }

    /**
     * @throws Exception
     */
    public function actionEditLanding($slug) {
        $model = Landing::getBySlug($slug);

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $img = Utilities::uploadImage(UploadedFile::getInstance($model, 'img'));
            $model->img = empty($img) ? $model->getOldAttribute('img') : $img;
            if (!$model->save()) Yii::$app->session->setFlash('error', Json::encode($model->getFirstErrors()));
            return $this->redirect(['site/landing-pages']);
        }
        return $this->renderAjax('_landing-form', ['model' => $model]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionDeleteLanding($slug) {
        $model = Landing::getBySlug($slug);
        Landing::deleteAll(['id' => $model->id]);
        Landing::purgeLandings();
        return true;
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionDeleteRealEstate($slug) {
        $model = RealEstateTypes::getBySlug($slug);
        RealEstateTypes::deleteAll(['id' => $model->id]);
        return true;
    }
}
