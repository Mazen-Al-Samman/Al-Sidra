<?php
/* @var $model Landing */

use common\models\Landing;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>
<div class="widget-content widget-content-area text-left">
    <?php $form = ActiveForm::begin(['method' => 'POST']) ?>
    <div class="main-data">
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'slug')->textInput() ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'title')->textInput() ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <?= Html::submitButton('حفــظ', ['class' => 'btn btn-dark btn-lg font-weight-bold w-100']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>