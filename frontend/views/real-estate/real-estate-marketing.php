<?php
/* @var $model RealEstateMarketing */

use common\models\RealEstateMarketing;
use common\models\RealEstateTypes;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="container-fluid">
    <div class="row content-center">
        <div class="col-10 real-estate-request with-background text-center p-3" dir="rtl">
            <h1 class="section-heading centered font-din">طـلــب تـســويق</h1>
            <?php $form = ActiveForm::begin([
                'method' => 'POST',
                'enableAjaxValidation' => true,
                'validateOnSubmit' => true,
                'options' => ['enctype' => 'multipart/form-data'],
            ]) ?>
            <div class="row content-center color-sky">
                <div class="col-lg-3">
                    <?= $form->field($model, 'customer_name')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-control']) ?>
                </div>
            </div>

            <div class="row content-center color-sky">
                <div class="col-lg-3">
                    <?= $form->field($model, 'real_estate_location')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'real_estate_type')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(RealEstateTypes::getAll(), 'label', 'label'),
                        'theme' => Select2::THEME_KRAJEE_BS5,
                        'options' => ['placeholder' => 'نوع العقــار'],
                        'language' => 'ar',
                    ]); ?>
                </div>

                <div class="col-lg-2">
                    <?= $form->field($model, 'report_img')->input('file', ['style' => 'padding-bottom: 35px']) ?>
                </div>

                <div class="col-lg-2">
                    <?= $form->field($model, 'real_estate_img')->input('file', ['style' => 'padding-bottom: 35px']) ?>
                </div>
            </div>

            <?= Html::submitButton('إرســال', ['class' => 'btn bg-dark-blue text-light font-weight-bold mt-3']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
