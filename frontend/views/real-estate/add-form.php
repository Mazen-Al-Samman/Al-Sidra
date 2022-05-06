<?php
/** @var $model RealEstateRequest */

use common\models\RealEstateTypes;
use frontend\models\RealEstateRequest;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="container-fluid">
    <div class="row content-center">
        <div class="col-10 real-estate-request with-background text-center p-3" dir="rtl">
            <h1 class="section-heading centered font-din">إضـــافة عقـــار</h1>
            <?php $form = ActiveForm::begin([
                'id' => 'add-form',
                'method' => 'POST',
                'enableAjaxValidation' => true,
                'validateOnSubmit' => true,
            ]) ?>

            <div class="row content-center color-sky">
                <div class="col-lg-3">
                    <?= $form->field($model, 'contract_type')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map([['id' => '1', 'value' => 'للبيــع'], ['id' => '2', 'value' => 'للإيجــار']], 'value', 'value'),
                        'theme' => Select2::THEME_KRAJEE_BS5,
                        'options' => ['placeholder' => 'نوع العقــد'],
                        'language' => 'ar',
                    ]); ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'real_estate_type')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(RealEstateTypes::getAll(), 'label', 'label'),
                        'theme' => Select2::THEME_KRAJEE_BS5,
                        'options' => ['placeholder' => 'نوع العقــار'],
                        'language' => 'ar',
                    ]); ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'address')->textInput(['class' => 'form-control']) ?>
                </div>
            </div>

            <div class="row content-center color-sky">
                <div class="col-lg-3">
                    <?= $form->field($model, 'city')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'neighborhood')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'street')->textInput(['class' => 'form-control']) ?>
                </div>
            </div>

            <div class="row content-center color-sky">
                <div class="col-lg-3">
                    <?= $form->field($model, 'num_of_interfaces')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'num_of_streets')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'price')->textInput(['class' => 'form-control']) ?>
                </div>
            </div>

            <div class="row content-center color-sky">
                <div class="col-lg-3">
                    <?= $form->field($model, 'area')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'customer_name')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-lg-3">
                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-control']) ?>
                </div>
            </div>

            <div class="row content-center mt-3 color-sky">
                <div class="col-lg-6">
                    <?= $form->field($model, 'notes')->textarea(['class' => 'form-control w-100', 'style' => 'height: 150px;']) ?>
                </div>
            </div>

            <?= Html::submitButton('أرســل', ['class' => 'btn bg-dark-blue text-light font-weight-bold mt-3']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
