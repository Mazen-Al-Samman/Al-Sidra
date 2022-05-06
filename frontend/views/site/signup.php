<?php
/** @var $model SignupForm */

use frontend\models\SignupForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container content-center">
    <div class="row w-100 rounded content-center text-center">
        <div class="col-8 bg-light p-5 rounded">
            <?php $form = ActiveForm::begin([
                'id' => 'signup-form',
                'enableAjaxValidation' => true,
                'validateOnSubmit' => true
            ]); ?>
            <?= $form->field($model, 'username')->textInput() ?>
            <br>
            <?= $form->field($model, 'email')->textInput()->input('email') ?>
            <br>
            <?= $form->field($model, 'phone')->textInput()->input('phone') ?>
            <br>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('إنشــاء حســاب جـديــد', ['class' => 'btn main-bg pt-1 mt-4 font-weight-bold', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

            <p class="font-15 font-weight-bold mt-2">لديـك حســاب؟ سـجل الدخول من <a
                        href="<?= Url::to(['site/login']) ?>">هنا</a></p>
        </div>
    </div>
</div>