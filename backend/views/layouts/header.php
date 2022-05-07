<?php

use yii\helpers\Url;

$currentBreadcrumbKey = Yii::$app->controller->id . "-" . Yii::$app->controller->action->id;
$translations = [
    'site-index' => 'الرئيسية',
    'site-landing-pages' => 'الصفحات الثابتة',
    'site-real-estate' => 'أنــواع العـقـارات',
    'site-real-estate-config' => 'أنــواع العـقـارات',
    'real-estate-request' => 'نموذج طلب عقار',
    'real-estate-view' => 'بيانات النموذج',
];

?>
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="<?= Url::to(['site/index']) ?>">
                    <img src="<?= Yii::getAlias('@img') ?>/sidra.svg" class="navbar-logo bg-light" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="<?= Url::to(['site/index']) ?>" class="nav-link"> السـدرة العقـاريـة </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row margin-right-auto">
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="<?= Yii::getAlias('@img') ?>/90x90.jpg" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a href="<?= Url::to(['site/logout']) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                تسجيل الخروج</a>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
</div>

<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-nav flex-row" dir="ltr">
            <li>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">
                                <span><?= !empty($translations[$currentBreadcrumbKey]) ? $translations[$currentBreadcrumbKey] : '' ?></span>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">لوحة التحكم</a></li>
                        </ol>
                    </nav>
                </div>
            </li>
        </ul>
    </header>
</div>

<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <a href="#dashboard" data-href-id="site" data-toggle="collapse" aria-expanded="false"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>إعدادات الموقع</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" data-main-id="site" id="dashboard"
                        data-parent="#accordionExample">
                        <li data-sub-id="landing-pages">
                            <a href="<?= Url::to(['site/landing-pages']) ?>">الصفحات الثابتـة</a>
                        </li>
                        <li data-sub-id="real-estate">
                            <a href="<?= Url::to(['site/real-estate']) ?>">أنواع العقــارات</a>
                        </li>
                    </ul>
                </li>

                <li class="menu">
                    <a href="#dashboard" data-href-id="real-estate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>النمـاذج</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" data-main-id="real-estate" id="dashboard"
                        data-parent="#accordionExample">
                        <li data-sub-id="request">
                            <a href="<?= Url::to(['real-estate/request']) ?>">نـمـوذج طـلب عقـار</a>
                        </li>
                        <li data-sub-id="add">
                            <a href="<?= Url::to(['real-estate/add']) ?>">نـمـوذج إضـافة عقـار</a>
                        </li>
                        <li data-sub-id="rating">
                            <a href="<?= Url::to(['real-estate/rating']) ?>">نـمـوذج تقـييـم عقاري</a>
                        </li>
                        <li data-sub-id="marketing">
                            <a href="<?= Url::to(['real-estate/marketing']) ?>">نـمـوذج تسـويق عقاري</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>