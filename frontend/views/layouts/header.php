<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<!-- Main Nav With Logo -->
<div class="container-fluid d-block mb-5">
    <div class="navbar-sidra" dir="rtl">
        <div class="row">
            <div class="col-lg-2 col-sm-12 p-3">
                <img src="<?= Yii::getAlias('@img') . '/logo.png' ?>" loading="lazy" width="250" class="img-fluid"
                     alt="Logo">
            </div>
        </div>
    </div>
</div>

<!-- Clear will add a space between the top header and other contents -->
<div class="clear"></div>

<div class="container" dir="rtl">
    <div class="row" style="margin-top: 10px">
        <div class="col-lg-2 col-sm-12 content-center">
            <?= Html::a('الرئيسـيــة', Url::to(['site/index']), ['class' => 'btn main-bg p-2 w-100']) ?>
        </div>

        <div class="col-lg-2 col-sm-12" style="display: flex; justify-content: center">
            <div data-hover="true" class="w-dropdown mt-2">
                <div class="dropdown-toggle-2 w-dropdown-toggle">
                    <div class="icon w-icon-dropdown-toggle"></div>
                    <div class="text-block-12">الــخــدمـــــات</div>
                </div>
                <nav class="w-dropdown-list">
                    <a href="#" class="dropdown-link w-dropdown-link">التقييم العقاري</a>
                    <a href="#" class="dropdown-link w-dropdown-link">التسويق العقاري</a>
                    <a href="#" class="dropdown-link w-dropdown-link">إدارة أملاك عقارية</a>
                    <a href="#" class="dropdown-link w-dropdown-link">التطوير العقاري</a>
                    <a href="#" class="dropdown-link w-dropdown-link">خدمة المعاينة</a>
                    <a href="#" class="dropdown-link w-dropdown-link">خدمة الاستشارة </a>
                </nav>
            </div>
        </div>

        <div class="col-lg-2 col-sm-12 content-center">
            <div data-hover="true" class="w-dropdown mt-2">
                <div class="dropdown-toggle-2 w-dropdown-toggle">
                    <i class="icon w-icon-dropdown-toggle"></i>
                    <div class="text-block-12">عقـــارات</div>
                </div>
                <nav class="w-dropdown-list">
                    <a href="#" class="dropdown-link w-dropdown-link">أرض</a>
                    <a href="#" class="dropdown-link w-dropdown-link">مزرعة</a>
                    <a href="#" class="dropdown-link w-dropdown-link">محل</a>
                    <a href="#" class="dropdown-link w-dropdown-link">فلة</a>
                    <a href="#" class="dropdown-link w-dropdown-link">دبلكس</a>
                    <a href="#" class="dropdown-link w-dropdown-link">عمارة</a>
                    <a href="#" class="dropdown-link w-dropdown-link">شقة</a>
                </nav>
            </div>
        </div>

        <div class="col-lg-2 col-sm-12 mt-2 content-center">
            <?= Html::a('طلب عقــار', Url::to(['site/index']), ['class' => 'href-link text-dark']) ?>
        </div>

        <div class="col-lg-2 col-sm-12 content-center">
            <?= Html::a('إضـافـة عقــار', Url::to(['site/index']), ['class' => 'href-link mt-2 text-dark']) ?>
        </div>

        <div class="col-lg-2 col-sm-12 content-center">
            <?= Html::a('تـواصل معنــا', Url::to(['site/index']), ['class' => 'href-link mt-2 text-dark']) ?>
        </div>
    </div>
</div>

<div class="clear"></div>