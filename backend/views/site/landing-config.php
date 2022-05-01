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
                            <h3 class="font-weight-bold">الصفحــات الثابــتة</h3>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12 pt-3 text-right col-6">
                            <?= Html::button('إنشــاء صفحة جديدة', ['class' => 'btn btn-success font-weight-bold', 'data-modal' => Yii::$app->controller->id, 'data-label' => "إنشــاء صفــحة", 'value' => Url::to(['site/create-landing'])]); ?>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'rowOptions' => ['class' => 'text-center'],
                        'columns' => [
                            'slug',
                            'main_text',
                            'body',
                            'phone',
                            [
                                'attribute' => 'img',
                                'format' => 'html',
                                'value' => function ($model) {
                                    return Html::img($model->imagePath, ['width' => 50]);
                                }
                            ],
                            [
                                'attribute' => 'has_whatsapp',
                                'value' => function ($model) {
                                    return Constant::YES_NO[$model->has_whatsapp];
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{edit} {delete}',
                                'buttons' => [
                                    'edit' => function ($url, $model) {
                                        return Html::button('تعديل', ['class' => 'btn btn-info font-weight-bold', 'data-modal' => Yii::$app->controller->id, 'data-label' => "تـعــديل الصفـحــة", 'value' => Url::to(['site/edit-landing', 'slug' => $model->slug])]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::button('حذف', ['class' => 'btn btn-danger font-weight-bold', 'data-role' => 'delete', 'data-url' => Url::to(['site/delete-landing', 'slug' => $model->slug])]);
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