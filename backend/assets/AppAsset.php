<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
// <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/main.css',
        'css/site.css',
        'css/plugins.css',
        'bootstrap/css/bootstrap.min.css',
        'css/authentication/form-2.css',
        'css/forms/theme-checkbox-radio.css',
        'css/forms/switches.css',
        'img/favicon.ico',
    ];
    public $js = [
        'js/libs/jquery-3.1.1.min.js',
        'bootstrap/js/popper.min.js',
        'bootstrap/js/bootstrap.min.js',
        'js/authentication/form-1.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
