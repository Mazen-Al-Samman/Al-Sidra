<?php
/* @var $dataProvider ActiveDataProvider */

use backend\web\widgets\ModalWidget;
use common\models\Constant;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?= ModalWidget::widget() ?>
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12 pt-3 text-left col-6">
                            <h3>الصفحــات الثابــتة</h3>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 pt-3 text-right col-6">
                            <?= Html::button('إنشــاء صفحة جديدة', ['class' => 'btn btn-success font-weight-bold', 'data-modal' => Yii::$app->controller->id, 'data-label' => "إنشــاء صفــحة", 'value' => Url::to(['site/create-landing'])]); ?>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'slug',
                            'main_text',
                            'body',
                            'phone',
                            [
                                'attribute' => 'img',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return Html::img($model->imagePath, ['width' => 100]);
                                }
                            ],
                            [
                                'attribute' => 'has_whatsapp',
                                'value' => function ($model) {
                                    return Constant::STATUS_NAMES[$model->has_whatsapp];
                                }
                            ]
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>