<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/site.css',
        'css/plugins.css',
        'css/loader.css',
        'bootstrap/css/bootstrap.min.css',
        'css/authentication/form-2.css',
        'css/forms/theme-checkbox-radio.css',
        'css/forms/switches.css',
        'plugins/apex/apexcharts.css',
        'plugins/perfect-scrollbar/perfect-scrollbar.css',
        'css/dashboard/dash_2.css',
    ];
    public $js = [
        'js/app.js',
        'js/main.js',
        'js/libs/jquery-3.1.1.min.js',
        'js/loader.js',
        'bootstrap/js/popper.min.js',
        'bootstrap/js/bootstrap.min.js',
        'js/authentication/form-2.js',
        'js/custom.js',
        'plugins/apex/apexcharts.min.js',
        'plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        'js/dashboard/dash_2.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
