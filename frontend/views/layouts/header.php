<?php

use common\models\Landing;
use common\models\RealEstateTypes;
use yii\helpers\Html;
use yii\helpers\Url;

$landingPages = Landing::getAll(false);
$realEstateTypes = RealEstateTypes::getAll();
$currentKey = Yii::$app->controller->id . "-" . Yii::$app->controller->action->id;
$navBarItems = [
    [
        'label' => 'الرئيسـيــة',
        'key' => 'site-index',
        'items' => [],
        'url' => Url::to(['site/index']),
        'guest' => true
    ],
    [
        'label' => 'الــخــدمـــــات',
        'key' => 'site-services',
        'items' => array_merge([
            ['label' => "طلب عقــار", 'url' => Url::to(['real-estate/request'])],
            ['label' => "إضـافـة عقــار", 'url' => Url::to(['real-estate/add'])],
            ['label' => "التسويق العقاري", 'url' => Url::to(['real-estate/marketing'])],
            ['label' => "التقييم العقاري", 'url' => Url::to(['real-estate/rate'])],
        ], $landingPages),
        'url' => Url::to(['site/index']),
        'guest' => true
    ],
    [
        'label' => 'عقـــارات',
        'key' => 'real-estate-types',
        'items' => $realEstateTypes,
        'url' => Url::to(['site/index']),
        'guest' => true
    ],
    [
        'label' => 'تـواصل معنــا',
        'key' => 'site-contact-us',
        'items' => [],
        'url' => Url::to(['site/contact-us']),
        'guest' => true
    ],
    [
        'label' => 'تسجيل الخروج',
        'key' => '',
        'items' => [],
        'url' => Url::to(['site/logout']),
        'guest' => false
    ],
];

if (Yii::$app->member->isGuest) {
    $navBarItems = array_merge($navBarItems, [
        [
            'label' => 'التسـجيل',
            'key' => 'site-signup',
            'items' => [],
            'url' => Url::to(['site/signup']),
            'guest' => true
        ],
        [
            'label' => 'تسجيل الدخـول',
            'key' => 'site-login',
            'items' => [],
            'url' => Url::to(['site/login']),
            'guest' => true
        ]]);
}
?>

<!-- Main Nav With Logo -->
<div class="container-fluid d-block text-center">
    <div class="navbar-sidra ml-2 mr-2" dir="rtl">
        <div class="row">
            <div class="col-lg-2 col-sm-12 p-3">
                <img src="<?= Yii::getAlias('@img') . '/logo.png' ?>" loading="lazy" width="250" class="img-fluid"
                     alt="Logo">
            </div>
        </div>
    </div>
</div>

<div class="container mt-4" dir="rtl">
    <div class="row content-center" style="margin-top: 10px; align-items: center">
        <?php
        foreach ($navBarItems as $navBarItem) : ?>
            <?php if (!$navBarItem['guest'] && Yii::$app->member->isGuest) continue; ?>
            <div class="col-lg-2 mt-3 position-relative col-sm-12 text-center">
                <?php if (empty($navBarItem['items'])) : ?>
                    <?= Html::a($navBarItem['label'], $navBarItem['url'], ['class' => ($currentKey == $navBarItem['key'] ? 'btn main-bg w-100' : 'href-link mt-2 text-dark')]) ?>
                <?php else: ?>
                    <div data-hover="true" class="w-dropdown">
                        <div class="dropdown-toggle-2 w-dropdown-toggle">
                            <?= $navBarItem['label'] ?>
                        </div>
                        <nav class="w-dropdown-list">
                            <?php foreach ($navBarItem['items'] as $item) : ?>
                                <a href="<?= $item['url'] ?>"
                                   class="dropdown-link w-dropdown-link text-dark"><?= $item['label'] ?></a>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <hr class="mt-5 w-75 d-lg-none">
</div>

<div style="margin: 50px"></div>