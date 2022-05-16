<?php

namespace frontend\controllers;

use common\models\Landing;
use common\models\Member;
use common\models\RealEstateTypes;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'user' => 'member',
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

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
     * @throws NotFoundHttpException
     */
    public function actionLanding($slug)
    {
        $landingModel = Landing::getBySlug($slug);
        return $this->render('landing', ['model' => $landingModel]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = RealEstateTypes::getBySlug($slug);
        return $this->render('real-estate-view', ['model' => $model]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->member->isGuest) return $this->goHome();

        $model = new Member();
        $model->scenario = 'login';
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $loggedInModel = $model->getMember();
            if (!empty($loggedInModel)) {
                Yii::$app->member->login($loggedInModel, 3600 * 24 * 30);
                return $this->goBack();
            }
            ActiveForm::validate($model);
        }
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->member->logout();
        return $this->goHome();
    }

    /**
     * @throws Exception
     */
    public function actionSignup()
    {
        $model = new Member();
        $model->scenario = 'signup';

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $model->generateAuthKey();
            $type = 'success';
            $msg = 'تم التسجيل , يمكنك تسجيل الدخول الان';
            if (!$model->save()) {
                $type = 'error';
                $msg = 'حدث خطأ ما .. يرجى المحاولة لاحقـًا';
            }
            Yii::$app->session->setFlash($type, $msg);
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
