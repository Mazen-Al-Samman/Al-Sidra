<?php

/** @var View $this */

/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php
        $this->registerCsrfMetaTags();
        $this->registerCssFile("https://fonts.gstatic.com", ['position' => View::POS_HEAD]);
        $this->registerCssFile("https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap", ['position' => View::POS_HEAD]);
        ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php if (Yii::$app->controller->action->id != 'login') echo $this->render('header') ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
