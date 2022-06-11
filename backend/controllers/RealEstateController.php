<?php

namespace backend\controllers;

use common\models\BaseModel;
use common\models\RealEstate;
use common\models\RealEstateMarketing;
use common\models\RealEstateRating;
use common\models\RealEstateRequest;
use yii\data\ActiveDataProvider;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;

/**
 * RealEstate controller
 */
class RealEstateController extends AccessController
{
    public function actionRequest()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RealEstateRequest::find()
        ]);
        return $this->render('request', ['dataProvider' => $dataProvider]);
    }

    public function actionAdd()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RealEstate::find()
        ]);
        return $this->render('add', ['dataProvider' => $dataProvider]);
    }

    public function actionRating()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RealEstateRating::find()
        ]);
        return $this->render('rating', ['dataProvider' => $dataProvider]);
    }

    public function actionMarketing()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RealEstateMarketing::find()
        ]);
        return $this->render('marketing', ['dataProvider' => $dataProvider]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView($id, $type)
    {
        $model = BaseModel::getById($id, $type);
        return $this->render('view', ['model' => $model]);
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionRead($id, $type) {
        BaseModel::ReadModel($id, $type);
        return $this->redirect(["real-estate/{$type}"]);
    }

    /**
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete($id, $type) {
        BaseModel::deleteModel($id, $type);
        return $this->redirect(["real-estate/{$type}"]);
    }
}
