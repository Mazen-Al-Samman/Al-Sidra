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
                            <h3 class="font-weight-bold">أنــواع العقــارات</h3>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 pt-3 text-right col-6">
                            <?= Html::button('إضافة عقار جديد', ['class' => 'btn btn-success font-weight-bold', 'data-modal' => Yii::$app->controller->id, 'data-label' => "إضــافـــة عقـــار", 'value' => Url::to(['site/create-real-estate'])]); ?>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'headerRowOptions' => ['class' => 'text-center'],
                        'rowOptions' => ['class' => 'text-center'],
                        'columns' => [
                            'slug',
                            'title',
                            [
                                'attribute' => 'created_at',
                                'value' => function ($model) {
                                    return date('Y-m-d', strtotime($model->created_at));
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => '<span class="text-dark">الإعدادات</span>',
                                'template' => '{edit} {delete} {config}',
                                'buttons' => [
                                    'edit' => function ($url, $model) {
                                        return Html::button('تعديل', ['class' => 'btn btn-info font-weight-bold', 'data-modal' => Yii::$app->controller->id, 'data-label' => "تـعــديل العقــار", 'value' => Url::to(['site/edit-real-estate', 'slug' => $model->slug])]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::button('حذف', ['class' => 'btn btn-danger font-weight-bold', 'data-role' => 'delete', 'data-url' => Url::to(['site/delete-real-estate', 'slug' => $model->slug])]);
                                    },
                                    'config' => function ($url, $model) {
                                        return Html::a('المحتوى', Url::to(['site/real-estate-config', 'slug' => $model->slug]),['class' => 'btn btn-warning font-weight-bold']);
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