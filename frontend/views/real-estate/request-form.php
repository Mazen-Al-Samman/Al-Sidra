<?php
/** @var $model RealEstateRequest */

use frontend\models\RealEstateRequest;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>

<div class="container-fluid">
    <div class="row content-center">
        <div class="col-10 real-estate-request with-background text-center p-3" dir="rtl">
            <h1 class="section-heading centered font-din">التــواصـل المبــاشـــر</h1>
            <?php $form = ActiveForm::begin([
                'id' => 'request-form',
                'method' => 'POST',
                'enableAjaxValidation' => true,
                'validateOnSubmit' => true,
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

            <div class="row content-center mt-3 color-sky">
                <div class="col-lg-6">
                    <?= $form->field($model, 'message')->textarea(['class' => 'form-control w-100', 'style' => 'height: 150px;']) ?>
                </div>
            </div>

            <?= Html::submitButton('أرســل', ['class' => 'btn bg-dark-blue text-light font-weight-bold mt-3']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
