<?php

/* @var $model RealEstateRating */

use frontend\models\RealEstateRating;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container-fluid">
    <div class="row content-center">
        <div class="col-10 real-estate-request with-background text-center p-3" dir="rtl">
            <h1 class="section-heading centered font-din">طـلــب تقـييــم عقــاري</h1>
            <?php $form = ActiveForm::begin(['method' => 'POST']) ?>
            <div class="row content-center color-sky">
                <div class="col-3">
                    <?= $form->field($model, 'customer_name')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-3">
                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-3">
                    <?= $form->field($model, 'real_estate_type')->textInput(['class' => 'form-control']) ?>
                </div>
            </div>

            <div class="row content-center color-sky">
                <div class="col-3">
                    <?= $form->field($model, 'reporter_name')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-3">
                    <?= $form->field($model, 'real_estate_location')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-3">
                    <?= $form->field($model, 'rating_reason')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map([['id' => '1', 'value' => 'للبيــع'], ['id' => '2', 'value' => 'للإيجــار']], 'value', 'value'),
                        'theme' => Select2::THEME_KRAJEE_BS5,
                        'options' => ['placeholder' => 'الغـرض من التقيـيــم'],
                        'language' => 'ar',
                    ]); ?>
                </div>
            </div>

            <?= Html::submitButton('إتمــام الطلــب', ['class' => 'btn bg-dark-blue w-10 text-light font-weight-bold mt-3']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>