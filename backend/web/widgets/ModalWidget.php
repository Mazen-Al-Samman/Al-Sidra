<?php
namespace backend\web\widgets;
use yii\base\Widget;

class ModalWidget extends Widget
{
    public function run()
    {
        return $this->render('widget-modal');
    }
}