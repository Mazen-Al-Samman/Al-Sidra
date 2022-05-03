<?php
/* @var $model RealEstateTypes */

use backend\web\widgets\ModalWidget;
use backend\web\widgets\SortableWidget;
use common\models\RealEstateTypes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$configModel = $model->config;
if (!empty($configModel)) $configModel->validate();
$cards = !empty($configModel->cards) ? $configModel->cards : [];
?>

<?= ModalWidget::widget() ?>
<ul style="display: none" id="template">
    <li draggable="true" role="option" aria-grabbed="false">
        <div class="position-relative">
            <img class="position-absolute delete-icon" src="https://img.icons8.com/external-gliphyline-royyan-wijaya/32/fa314a/external-delete-gloria-interface-glyph-gliphyline-royyan-wijaya.png" alt="Delete"/>
            <div class="card component-card_9" style="width: 350px">
                <div class="card-img-top mt-3" style="background-image: url(<?= Yii::$app->params['filesUrl'] . '/__img__' ?>); background-size: cover;"></div>
                <hr class="ml-4 mr-4">
                <div class="card-body text-center">
                    <h5 class="card-title">__title__</h5>
                    <p class="card-text mt-3">__body__</p>
                </div>
                <input type="hidden" name="RealEstateItem[__key__][title]" value="__input_title__">
                <input type="hidden" name="RealEstateItem[__key__][body]" value="__input_body__">
                <input type="hidden" name="RealEstateItem[__key__][img]" value="__input_img__">
            </div>
        </div>
    </li>
</ul>

<div id="content" class="main-content">
    <?php $form = ActiveForm::begin(['method' => 'POST']) ?>
    <div class="layout-px-spacing">
        <div class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-lg-6 mt-3">
                            <h3 class="font-weight-bold">المحـتوى لـنوع العقـار <span
                                        class="text-warning"><?= $model->title ?></span></h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-end mt-3">
                            <?= Html::button('مـربـع محتــوى جـديـد', [
                                'class' => 'btn btn-info font-weight-bold ml-2',
                                'data-modal' => Yii::$app->controller->id,
                                'value' => Url::to(['site/add-item']),
                                'data-label' => 'بيـانـات مـربع المحتوى'
                            ]) ?>

                            <?= Html::submitButton('حفــظ التغـييرات', ['class' => 'btn btn-secondary font-weight-bold']) ?>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="container">
                        <div class="row" dir="ltr">
                            <?= SortableWidget::widget(['cards' => $cards]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
