<?php

namespace backend\web\widgets;

use Yii;
use yii\base\Widget;

class SortableWidget extends Widget
{
    public function run()
    {
        Yii::$app->params['bsDependencyEnabled'] = false;
        return $this->render('sortable-view');
    }
}