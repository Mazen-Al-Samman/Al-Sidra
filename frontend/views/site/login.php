<?php
/** @var $model LoginForm */

use common\models\LoginForm;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container content-center">
    <div class="row w-100 rounded content-center text-center">
        <div class="col-8 bg-light p-5 rounded">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'phone')->textInput() ?>
            <br>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('تسجيل الدخول', ['class' => 'btn main-bg pt-1 mt-4 font-weight-bold', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

            <p class="font-15 font-weight-bold mt-2">مستخدم جديد؟ يمكنك إنشاء حساب من <a href="<?= Url::to(['site/signup']) ?>">هنا</a></p>
        </div>
    </div>
</div>