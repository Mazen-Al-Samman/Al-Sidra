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
                            <h3 class="font-weight-bold">نمـوذج إضـافة عقـار</h3>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'headerRowOptions' => ['class' => 'text-center'],
                        'rowOptions' => ['class' => 'text-center'],
                        'columns' => [
                            'contract_type',
                            'real_estate_type',
                            'address',
                            'city',
                            'neighborhood',
                            'street',
                            'num_of_interfaces',
                            'num_of_streets',
                            'price',
                            'area',
                            'phone',
                            'customer_name',
                            'notes',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => '<span class="text-dark">الإعدادات</span>',
                                'template' => '{view} {delete}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('مشاهدة الطلب', Url::to(['real-estate/view', 'id' => $model->id, 'type' => Yii::$app->controller->action->id]), ['class' => 'btn btn-info font-weight-bold']);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::button('حذف', ['class' => 'btn btn-danger font-weight-bold', 'data-role' => 'delete', 'data-url' => Url::to(['real-estate/delete', 'id' => $model->id, 'type' => Yii::$app->controller->action->id])]);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>