<?php
/* @var $model RealEstateItem */

use common\models\RealEstateItem;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>
    <div class="widget-content widget-content-area text-left">
        <?php $form = ActiveForm::begin([
            'method' => 'POST',
            'id' => 'item-form',
            'validationUrl' => Url::to(['site/add-item', 'validate' => true]),
            'enableAjaxValidation' => true
        ]) ?>
        <div class="main-data text-center">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-lg-10">
                    <?= $form->field($model, 'body')->textarea() ?>
                </div>
                <div class="col-lg-10 d-flex justify-content-center mt-3">
                    <?= $form->field($model, 'img')->fileInput(['class' => 'form-control pb-5 pt-3'])->label(false) ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <?= Html::submitButton('حفــظ', ['class' => 'btn btn-dark btn-lg font-weight-bold w-100', 'id' => 'item-submit']) ?>
        </div>
        <?php ActiveForm::end() ?>
    </div>

<?php
$this->registerJs(<<< JS
$('#item-form').submit(function(e) {
    e.preventDefault();
    e.stopImmediatePropagation();
    e.stopPropagation();
    let formData = new FormData(this);
    $.ajax({
        url: '/site/add-item',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data, textStatus, xhr) {
            if (xhr.status === 201) return false;
            let html = $('#template').html();
            html = html.replace('__img__', data.img).replace('__title__', data.title).replace('__body__', data.body);
            let sortable = $('.sortable');
            sortable.append(html);
            $('.modal').modal('hide');
        }
    });
    return false;
});
JS
);
?>