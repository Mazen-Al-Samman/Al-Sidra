<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var LoginForm $model */

use backend\assets\AppAsset;
use common\models\LoginForm;
use yii\bootstrap4\ActiveForm;

AppAsset::register($this);
$this->title = 'تسجيل الدخول';
?>

<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">
                    <h1 class="text-center">تسجيل الدخول</h1>
                    <p class="text-center">يرجى تسجيل الدخول للمتابعة</p>

                    <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'text-left']); ?>
                    <div class="form">

                        <div id="username-field" class="field-wrapper input">
                            <label for="username">اسم المستخدم</label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'اسم المستخدم', 'id' => 'username'])->label(false) ?>
                        </div>

                        <div id="password-field" class="field-wrapper input mb-2">
                            <div class="d-flex justify-content-between">
                                <label for="password">كلمــة السر</label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-lock">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <?= $form->field($model, 'password')->label(false)->textInput(['class' => 'form-control', 'placeholder' => 'كلمة السر', 'id' => 'password'])->label(false) ?>
                        </div>
                        <div class="d-sm-flex justify-content-between">
                            <div class="field-wrapper">
                                <button type="submit" class="btn btn-primary" value="">تسجيل الدخول</button>
                            </div>
                        </div>

                        <p class="signup-link">لإنشاء حساب جديد .. تواصل مع منشئ الموقع</a></p>

                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
