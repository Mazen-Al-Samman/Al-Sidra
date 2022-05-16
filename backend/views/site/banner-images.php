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
                            <h3 class="font-weight-bold">صـور الصفحـة الرئيسيــة</h3>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 pt-3 text-right col-6"></div>
                        <div class="col-xl-12 mt-4">
                            <?= Html::button('إضــافة صـورة', ['class' => 'btn btn-success font-weight-bold', 'data-modal' => Yii::$app->controller->id, 'data-label' => "إضـافة صـورة", 'value' => Url::to(['site/add-banner-img'])]); ?>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'headerRowOptions' => ['class' => 'text-center'],
                        'rowOptions' => ['class' => 'text-center'],
                        'columns' => [
                            [
                                'attribute' => 'img_name',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return Html::img(Yii::getAlias(Yii::$app->params['filesUrl'] . $model->img_name), ['width' => '200', 'class' => 'img-preview']);
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => '<span class="text-dark">الإعدادات</span>',
                                'template' => '{edit} {delete}',
                                'buttons' => [
                                    'delete' => function ($url, $model) {
                                        return Html::button('حذف', ['class' => 'btn btn-danger font-weight-bold', 'data-role' => 'delete', 'data-url' => Url::to(['site/delete-banner', 'id' => $model->id])]);
                                    },
                                ],
                            ],
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>