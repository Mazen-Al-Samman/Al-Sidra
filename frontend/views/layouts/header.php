<?php

use common\models\Landing;
use yii\helpers\Html;
use yii\helpers\Url;

$landingPages = Landing::getAll(false);
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
            ['label' => "التقييم العقاري", 'url' => Url::to(['real-estate/rate'])],
            ['label' => "التسويق العقاري", 'url' => Url::to(['real-estate/marketing'])],
        ], $landingPages),
        'url' => Url::to(['site/index']),
        'guest' => true
    ],
    [
        'label' => 'عقـــارات',
        'key' => 'real-estate-types',
        'items' => [
            ['label' => "أرض", 'url' => Url::to(['real-estate/rate'])],
            ['label' => "مزرعة", 'url' => Url::to(['real-estate/rate'])],
            ['label' => "محل", 'url' => Url::to(['real-estate/rate'])],
        ],
        'url' => Url::to(['site/index']),
        'guest' => true
    ],
    [
        'label' => 'طلب عقــار',
        'key' => 'real-estate-request',
        'items' => [],
        'url' => Url::to(['real-estate/request']),
        'guest' => false
    ],
    [
        'label' => 'إضـافـة عقــار',
        'key' => 'real-estate-add',
        'items' => [],
        'url' => Url::to(['real-estate/add']),
        'guest' => false
    ],
    [
        'label' => 'تـواصل معنــا',
        'key' => 'contact-us',
        'items' => [],
        'url' => Url::to(['site/index']),
        'guest' => true
    ],
];

if (Yii::$app->user->isGuest) {
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
<div class="container-fluid d-block mb-5">
    <div class="navbar-sidra ml-2 mr-2" dir="rtl">
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
    <div class="row content-center" style="margin-top: 10px; align-items: center">
        <?php
        foreach ($navBarItems as $navBarItem) : ?>
            <?php if (!$navBarItem['guest'] && Yii::$app->user->isGuest) continue; ?>
            <div class="col-lg-2 col-sm-12 text-center">
                <?php if (empty($navBarItem['items'])) : ?>
                    <?= Html::a($navBarItem['label'], $navBarItem['url'], ['class' => ($currentKey == $navBarItem['key'] ? 'btn main-bg w-100' : 'href-link mt-2 text-dark')]) ?>
                <?php else: ?>
                    <div data-hover="true" class="w-dropdown">
                        <div class="dropdown-toggle-2 w-dropdown-toggle">
                            <div class="icon"></div>
                            <div class="text-block-12"><?= $navBarItem['label'] ?> <img class="mr-2"
                                                                                        src="https://img.icons8.com/ios/15/000000/expand-arrow--v2.png"
                                                                                        alt="Expand Arrow"/></div>
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
</div>

<div style="margin: 50px"></div>