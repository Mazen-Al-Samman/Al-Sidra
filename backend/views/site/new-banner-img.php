<?php
/** @var $model BannerImage */

use common\models\BannerImage;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

?>
<div class="container">
    <p class="alert alert-info">يجب إختيار صورة واضحة وبدقة عالية</p>
    <p class="alert alert-danger">تجنب الصور ذات الطول والعرض المتساويين, واستخدم الصور العرضية</p>
    <p class="alert alert-primary">الأبعـاد المناسبة للصورة : 2000 * 500</p>
    <hr>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]) ?>
    <?= $form->field($model, 'img_name')->fileInput()->label(false); ?>
    <hr>

    <?= Html::submitButton('حفــظ', ['class' => 'w-100 btn btn-dark p-2 font-weight-bold']) ?>
    <?php ActiveForm::end() ?>
</div>
