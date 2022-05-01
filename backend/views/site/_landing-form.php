<?php
/* @var $model Landing */

use common\models\Landing;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>
<div class="widget-content widget-content-area text-left">
    <?php $form = ActiveForm::begin(['method' => 'POST']) ?>
    <div class="main-data">
        <p class="alert alert-primary font-weight-bold text-center">لتحصل على أعلى دقـة ممكنة, قم بإضـافة صورة بدون
            خلفيـة وذات دقـة عاليـة</p>
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'slug')->textInput() ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'phone')->textInput() ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'main_text')->textarea() ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'body')->textarea() ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'has_whatsapp')->checkbox() ?>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <?= $form->field($model, 'img')->fileInput(['class' => 'form-control-file'])->label(false) ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <?= Html::submitButton('حفــظ', ['class' => 'btn btn-dark btn-lg font-weight-bold w-100']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>