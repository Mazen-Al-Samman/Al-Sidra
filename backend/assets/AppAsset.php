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
        'bootstrap/css/bootstrap.min.css',
        'css/plugins.css',
        'plugins/sweetalerts/sweetalert.css',
        'plugins/bootstrap-select/bootstrap-select.min.css',
        'plugins/perfect-scrollbar/perfect-scrollbar.css',
        'plugins/apex/apexcharts.css',
        'plugins/select2/select2.min.css',
        'plugins/flatpickr/flatpickr.css',
        'css/dashboard/dash_1.css',
        'css/authentication/form-1.css',
        'css/forms/theme-checkbox-radio.css',
        'css/forms/switches.css',
        'css/elements/custom-pagination.css',
        'plugins/flatpickr/custom-flatpickr.css',
        'css/authentication/form-2.css',
    ];
    public $js = [
        'bootstrap/js/popper.min.js',
        'bootstrap/js/bootstrap.min.js',
        'plugins/bootstrap-select/bootstrap-select.min.js',
        'plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        'plugins/sweetalerts/sweetalert.js',
        'plugins/flatpickr/flatpickr.js',
        'js/app.js',
        'js/custom.js',
        'plugins/select2/select2.min.js',
        'plugins/apex/apexcharts.min.js',
        'js/dashboard/dash_1.js',
        'js/authentication/form-1.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
