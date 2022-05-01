<?php

namespace backend\controllers;

use common\helpers\Utilities;
use common\models\Landing;
use common\models\LoginForm;
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
        return $this->redirect(['site/landing-pages']);
    }
}
