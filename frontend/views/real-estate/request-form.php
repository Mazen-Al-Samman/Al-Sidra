<?php
/** @var $model RealEstate */

use aryelds\sweetalert\SweetAlert;
use frontend\models\RealEstate;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if (!empty(Yii::$app->session->allFlashes)) :
    $flashes = Yii::$app->session->allFlashes;
    foreach ($flashes as $type => $msg) :
        echo SweetAlert::widget([
            'options' => [
                'title' => '',
                'text' => "<span class='font-cairo font-25 font-weight-bold'>{$msg}</span>",
                'type' => $type,
                'html' => true,
                'showConfirmButton' => true,
                'confirmButtonColor' => '#064221',
                'confirmButtonText' => 'مـوافق',
                'closeOnConfirm' => true
            ]
        ]);
    endforeach;
endif;
?>

<div class="container-fluid">
    <div class="row content-center">
        <div class="col-10 real-estate-request with-background text-center p-3" dir="rtl">
            <h1 class="font-weight-bold mb-5">التــواصـل المبــاشـــر</h1>
            <?php $form = ActiveForm::begin(['method' => 'POST']) ?>

            <div class="row content-center color-sky">
                <div class="col-3">
                    <?= $form->field($model, 'name')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-3">
                    <?= $form->field($model, 'email')->textInput(['class' => 'form-control']) ?>
                </div>

                <div class="col-3">
                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-control']) ?>
                </div>
            </div>

            <div class="row content-center mt-3 color-sky">
                <div class="col-6">
                    <?= $form->field($model, 'message')->textarea(['class' => 'form-control w-100', 'style' => 'height: 150px;']) ?>
                </div>
            </div>

            <?= Html::submitButton('أرســل', ['class' => 'btn main-bg mt-3']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
